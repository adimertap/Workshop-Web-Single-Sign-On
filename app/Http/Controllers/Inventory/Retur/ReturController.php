<?php

namespace App\Http\Controllers\Inventory\Retur;

use App\Http\Controllers\Controller;
use App\Model\Inventory\Rcv\Rcv;
use App\Model\Inventory\Rcv\Rcvdetail;
use App\Model\Inventory\Retur\Retur;
use App\Model\Inventory\Sparepart;
use App\Model\Inventory\Kartugudang\Kartugudang;
use App\Model\Inventory\Purchase\PO;
use App\Model\Inventory\Supplier;
use App\Model\Kepegawaian\Pegawai;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReturController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $retur = Retur::with([
            'Rcv.Detailrcv','Pegawai','Supplier'
        ])->get();

        $supplier = Supplier::all();

        $today = Carbon::now()->isoFormat('dddd');
        $tanggal = Carbon::now()->format('j F Y');
        
        return view('pages.inventory.retur.retur', compact('retur','supplier','today','tanggal'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $supplier = Supplier::where('nama_supplier',$request->nama_supplier)->first();
        $id_supplier = $supplier->id_supplier;

        $retur = Retur::create([
            'id_supplier'=>$id_supplier,
            'tanggal_retur'=>$request->tanggal_retur,
            'id_bengkel' => $request['id_bengkel'] = Auth::user()->id_bengkel
        ]);
        
        return $retur;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_retur)
    {
        $retur = Retur::with('Rcv.Detailrcv','Pegawai','Supplier.Sparepart.Merksparepart.Jenissparepart','Detailretur.Hargasparepart')->findOrFail($id_retur);

        return view('pages.inventory.retur.detail')->with([
            'retur' => $retur
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $retur = Retur::with([
            'Pegawai','Supplier.Sparepart.Merksparepart.Jenissparepart'
        ])->find($id);
        
        $id = Retur::getId();
        foreach($id as $value);
        $idlama = $value->id_retur;
        $idbaru = $idlama + 1;
        $blt = date('y-m');

        $kode_retur = 'RTR-'.$blt.'/'.$idbaru;

        // Generate Code Manggil Fungsi getId()
        // $id = Retur::getId();
        // $blt = date('y-m');
        // $kode_retur = 'RTR-'.$blt.'/'.$retur->id_retur;

        // Panggil
        $supplier = Supplier::all();
        $pegawai = Pegawai::all();

        return view('pages.inventory.retur.create', compact('retur','pegawai','supplier','kode_retur'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_retur)
    {
        // $supplier = Supplier::where('nama_supplier', $request->nama_supplier)->first();
        $retur = Retur::findOrFail($id_retur);
        $retur->id_pegawai = $request->id_pegawai;
        $retur->id_pegawai = $request['id_pegawai'] = Auth::user()->pegawai->id_pegawai;
        // $retur->id_supplier = $supp->id_supplier;
        $retur->kode_retur = $request->kode_retur;
        $retur->tanggal_retur = $request->tanggal_retur;

        $retur->status = 'Aktif';
        $retur->save();


        $retur->Detailretur()->sync($request->sparepart);
        return $request;
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_retur)
    {
        $retur = Retur::findOrFail($id_retur);
        
        $retur->delete();

        return redirect()->back()->with('messagehapus','Data Retur Berhasil dihapus');
    }
}

<?php

namespace App\Http\Controllers\Inventory\Retur;

use App\Http\Controllers\Controller;
use App\Model\Accounting\Akun;
use App\Model\Inventory\Rcv\Rcv;
use App\Model\Inventory\Retur\Retur;
use App\Model\Inventory\Sparepart;
use App\Model\Inventory\Supplier;
use App\Model\Kepegawaian\Pegawai;
use Carbon\Carbon;
use Illuminate\Http\Request;

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
            'Rcv','Pegawai','Supplier','Akun'
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
        $retur = Retur::with('Detail.Sparepart')->findOrFail($id_retur);

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
            'Rcv','Pegawai','Supplier.Sparepart.Merksparepart.Jenissparepart','Akun','Detailretur.Hargasparepart'
        ])->find($id);

        // Generate Code Manggil Fungsi getId()
        $id = Retur::getId();
        $blt = date('m');
        $kode_retur = 'RTR-'.$retur->id_retur.'/'.$blt;

        // Panggil
        $supplier = Supplier::all();
        $akun = Akun::all();
        $pegawai = Pegawai::all();

        

        return view('pages.inventory.retur.create', compact('retur','pegawai','supplier','akun','kode_retur','sparepart'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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

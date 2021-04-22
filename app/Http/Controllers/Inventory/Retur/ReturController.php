<?php

namespace App\Http\Controllers\Inventory\Retur;

use App\Http\Controllers\Controller;
use App\Model\Inventory\Rcv\Rcv;
use App\Model\Inventory\Rcv\Rcvdetail;
use App\Model\Inventory\Retur\Retur;
use App\Model\Inventory\Sparepart;
use App\Model\Inventory\Kartugudang\Kartugudang;
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
            'Rcv.Detailrcv','Pegawai','Supplier'
        ])->get();

        $supplier = Supplier::all();

        $today = Carbon::now()->isoFormat('dddd');
        $tanggal = Carbon::now()->format('j F Y');
        $rcv = Rcv::where([['status_retur', '=', 'Retur']])->get();
        
        return view('pages.inventory.retur.retur', compact('retur','supplier','today','tanggal','rcv'));
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
        $rcv = Rcv::where('kode_rcv',$request->kode_rcv)->first();
        $id_rcv = $rcv->id_rcv;
        $id_supplier = $rcv->id_supplier;

        $retur = Retur::create([
            'id_rcv'=>$id_rcv,
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
            'Rcv.Detailrcv','Pegawai','Supplier.Sparepart.Merksparepart.Jenissparepart','Detailretur.Hargasparepart'
        ])->find($id);

        // Generate Code Manggil Fungsi getId()
        $id = Retur::getId();
        $blt = date('y-m');
        $kode_retur = 'RTR-'.$blt.'/'.$retur->id_retur;

        // Panggil
        $supplier = Supplier::all();
        $pegawai = Pegawai::all();

        return view('pages.inventory.retur.create', compact('retur','pegawai','supplier','kode_retur','sparepart'));
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
        $rcv = Rcv::where('kode_rcv', $request->kode_rcv)->first();
        $retur = Retur::findOrFail($id_retur);
        $retur->id_pegawai = $request->id_pegawai;
        $retur->id_supplier = $rcv->id_supplier;
        $retur->id_rcv = $rcv->id_rcv;
        $retur->kode_retur = $request->kode_retur;
        $retur->tanggal_retur = $request->tanggal_retur;

        foreach($request->sparepart as $key=>$item){
            $sparepart = Sparepart::findOrFail($item['id_sparepart']);
            $sparepart->stock = $sparepart->stock + $item['qty_retur'];
            $sparepart->save();

            $kartu_gudang = new Kartugudang;
            $kartu_gudang->jumlah_masuk = $kartu_gudang->jumlah_mauk +$item['qty_retur'];
            $kartu_gudang->id_sparepart = $sparepart->id_sparepart;
            $kartu_gudang->id_retur = $retur->id_retur;
            $kartu_gudang->tanggal_transaksi = $retur->tanggal_retur;
            $kartu_gudang->jenis_kartu = 'Retur';
            $kartu_gudang->save();
        }

        $rcv->status_retur ='Tidak Retur';
        $rcv->save();
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

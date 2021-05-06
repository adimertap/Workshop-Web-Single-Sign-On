<?php

namespace App\Http\Controllers\Inventory\Rcv;

use App\Http\Controllers\Controller;
use App\Model\Accounting\Akun;
use App\Model\Inventory\Kartugudang\Kartugudang;
use App\Model\Inventory\Purchase\PO;
use App\Model\Inventory\Purchase\POdetail;
use App\Model\Inventory\Rak;
use App\Model\Inventory\Rcv\Rcv;
use App\Model\Inventory\Rcv\Rcvdetail;
use App\Model\Inventory\Sparepart;
use App\Model\Inventory\Supplier;
use App\Model\Kepegawaian\Pegawai;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\New_;

class RcvController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rcv = Rcv::with([
            'PO','Pegawai','Supplier'
        ])->get();
        

        $today = Carbon::now()->isoFormat('dddd');
        $tanggal = Carbon::now()->format('j F Y');

        $po = PO::where([['status', '=', 'Dikirim']])->get();
        
        return view('pages.inventory.rcv.rcv', compact('rcv','po','today','tanggal'));
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
        $po = PO::where('kode_po',$request->kode_po)->first();
        $id_po = $po->id_po;
        $id_supplier = $po->id_supplier;

        // 
        $rcv = Rcv::create([
            'id_po'=>$id_po,
            'id_supplier'=>$id_supplier,
            'no_do'=>$request->no_do,
            'tanggal_rcv'=>$request->tanggal_rcv,
        ]);
        
        return $rcv;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_rcv)
    {
        $rcv = Rcv::with('PO','Pegawai','Supplier','PO.Detailsparepart.Merksparepart.Jenissparepart','PO.Detailsparepart.Konversi','PO.Detailsparepart.Hargasparepart')->findOrFail($id_rcv);

        return view('pages.inventory.rcv.detail')->with([
            'rcv' => $rcv
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
        $rcv = Rcv::with([
            'PO','Pegawai','Supplier','PO.Detailsparepart.Merksparepart.Jenissparepart','PO.Detailsparepart.Konversi','PO.Detailsparepart.Hargasparepart'
        ])->find($id);
        
        $id = Rcv::getId();
        $blt = date('y-m');

        $kode_rcv = 'RCV-'.$blt.'/'.$rcv->id_rcv;

        $pegawai = Pegawai::all();
        $supplier = Supplier::all();
        $po = PO::where([['status', '=', 'Dikirim']])->get();
        
        return view('pages.inventory.rcv.create', compact('rcv','pegawai','po','supplier', 'kode_rcv'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_rcv)
    {
        $po = PO::where('kode_po', $request->kode_po)->first();
        $rcv = Rcv::findOrFail($id_rcv);
        $rcv->id_pegawai = $request->id_pegawai;
        $rcv->id_supplier = $po->id_supplier;
        $rcv->id_po = $po->id_po;
        $rcv->kode_rcv = $request->kode_rcv;
        $rcv->tanggal_rcv = $request->tanggal_rcv;
        // NYIMPEN GRAND TOTAL
        $temp = 0;
        $qtyrcv = 0;
        $qtypo = 0;

        foreach($request->sparepart as $key=>$item){
            // NAMBAH STOCK SPAREPART
            $sparepart = Sparepart::findOrFail($item['id_sparepart']);
            $sparepart->stock = $sparepart->stock + $item['qty_rcv'];
            $sparepart->save();

            // Mengurangi Qty PO
            $detailpo = POdetail::where('id_po',$po->id_po)->where('id_sparepart',$item['id_sparepart'])->first();
            
            $detailpo->qty = $detailpo->qty - $item['qty_rcv'];
            $detailpo->save(); 


            // KARTU GUDANG
            $kartu_gudang = new Kartugudang;
            $kartu_gudang->jumlah_masuk = $kartu_gudang->jumlah_masuk + $item['qty_rcv'];
            $kartu_gudang->id_sparepart = $sparepart->id_sparepart;
            $kartu_gudang->id_rcv = $rcv->id_rcv;
            $kartu_gudang->tanggal_transaksi = $rcv->tanggal_rcv;
            $kartu_gudang->jenis_kartu = 'Receiving';
            $kartu_gudang->save();

            // NGAMBIL TOTAL
            $temp = $temp + $item['total_harga'];
            $qtyrcv = $qtyrcv + $item['qty_rcv'];
            $qtypo = $qtypo + $item['qty_po'];
        }

        // CONDITION STATUS RETUR
        if($qtyrcv != $qtypo){

            // foreach($request->sparepartpo as $key=>$tes){
            //     $sparepartpo = PO::findOrFail($tes['id_sparepart']);
            //     $sparepartpo->qty = $sparepartpo->qty - $tes['qty_rcv'];
            //     $sparepartpo->save();
            // }

            $po->status ='Dikirim';
            $po->save();

            $rcv->grand_total = $temp;
            $rcv->status = 'aktif';
            $rcv->status_bayar = 'Pending';
            $rcv->save();

            $rcv->Detailrcv()->sync($request->sparepart);

            return $request;
        }
        else{
            $po->status ='Diterima';
            $po->save();
            $rcv->grand_total = $temp;
            $rcv->status = 'aktif';
            $rcv->status_bayar = 'Pending';
            $rcv->save();

            $rcv->Detailrcv()->sync($request->sparepart);

            return $request;
        }

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_rcv)
    {
        $rcv = Rcv::findOrFail($id_rcv);
        Rcvdetail::where('id_rcv', $id_rcv)->delete();
        $rcv->delete();

        return redirect()->back()->with('messagehapus','Data Penerimaan Berhasil dihapus');
    }

    public function post(Request $request)
    {
        return 'cccc';
        $po = PO::where('kode_po',$request->kode_po)->first();
        $id_po = $po->id_po;
        $id_supplier = $po->id_supplier;

        $rcv = Rcv::create([
            'id_po'=>$id_po,
            'id_supplier'=>$id_supplier,
            'no_do'=>$request->no_do,
            'tanggal_rcv'=>$request->tanggal_rcv,
        ]);
        
        return $rcv;
    }

}


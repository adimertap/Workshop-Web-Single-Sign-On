<?php

namespace App\Http\Controllers\Inventory\Rcv;

use App\Http\Controllers\Controller;
use App\Model\Accounting\Akun;
use App\Model\Inventory\Purchase\PO;
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
        $rcv = Rcv::with('Detail.Sparepart.Rak')->findOrFail($id_rcv);

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
        $rak = Rak::all();
        
        return view('pages.inventory.rcv.create', compact('rcv','pegawai','po','supplier', 'kode_rcv','rak'));
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
        $temp = 0;
        foreach($request->sparepart as $key=>$item){
            $sparepart = Sparepart::findOrFail($item['id_sparepart']);
            $sparepart->stock = $sparepart->stock + $item['qty_rcv'];
            $sparepart->save();
            $temp = $temp + $item['harga_diterima'];
        }

        $po->status ='Diterima';
        $po->save();
        $rcv->total_pembayaran = $temp;
        $rcv->status = 'aktif';
        $rcv->status_bayar = 'Pending';
        $rcv->save();


        $rcv->Detailrcv()->sync($request->sparepart);


        return $request;
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


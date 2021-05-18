<?php

namespace App\Http\Controllers\Inventory\Purchase;

use App\Http\Controllers\Controller;
use App\Model\Accounting\Akun;
use App\Model\Inventory\Purchase\PO;
use App\Model\Inventory\Purchase\POdetail;
use App\Model\Inventory\Sparepart;
use App\Model\Inventory\Supplier;
use App\Model\Kepegawaian\Pegawai;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PurchaseorderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $po = PO::with([
            'Supplier','Pegawai'
        ])->get();

        $id = PO::getId();
        foreach($id as $value);
        $idlama = $value->id_po;
        $idbaru = $idlama + 1;
        $blt = date('y-m');

        $kode_po = 'PO-'.$blt.'/'.$idbaru;

        $supplier = Supplier::all();
        $today = Carbon::now()->isoFormat('dddd');
        $tanggal = Carbon::now()->format('j F Y');

        return view('pages.inventory.purchase.po.po', compact('po','today','tanggal','kode_po','supplier'));
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

        $po = PO::create([
            'kode_po'=>$request->kode_po,
            'id_supplier'=>$id_supplier,
            'tanggal_po'=>$request->tanggal_po,
            'approve_po'=>'Pending',
            'approve_ap'=>'Pending',
            'id_bengkel' => $request['id_bengkel'] = Auth::user()->id_bengkel
           
        ]);
        
        return $po;

       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_po)
    {
        $po = PO::with('Detailsparepart')->findOrFail($id_po);
        // dd($po);

        return view('pages.inventory.purchase.po.detail')->with([
            'po' => $po
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
        $po = PO::with([
            'Pegawai','Supplier.Sparepart.Merksparepart.Jenissparepart','Detailsparepart','Supplier.Sparepart.Kartugudang','Supplier.Sparepart.Kartugudangterakhir'
        ])->where('id_bengkel','=', $id )->get();

        return $po;

        $id = PO::getId();
        foreach($id as $value);
        $idlama = $value->id_po;
        $idbaru = $idlama + 1;
        $blt = date('y-m');

        $kode_po = 'PO-'.$blt.'/'.$idbaru;
 
        $supplier = Supplier::all();
        $sparepart = Sparepart::all();
        $pegawai = Pegawai::all();

        return view('pages.inventory.purchase.po.create', compact('po','sparepart','supplier','pegawai','kode_po'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_po)
    {
        
        $po = PO::findOrFail($id_po);
        $po->id_pegawai = $request->id_pegawai;
        $po->kode_po = $request->kode_po;
        $po->tanggal_po = $request->tanggal_po;
        $temp = 0;
        foreach($request->sparepart as $key=>$item){
            $temp = $temp + $item['total_harga'];
        }

        $po->grand_total = $temp;
      
        
        $po->save();
        $po->Detailsparepart()->sync($request->sparepart);
        return $request;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_po)
    {
        $PO = PO::findOrFail($id_po);
        
        POdetail::where('id_po', $id_po)->delete();
        $PO->delete();

        return redirect()->back()->with('messagehapus','Data Pembelian Berhasil dihapus');
    }

    public function setStatus(Request $request, $id_po)
    {
        $request->validate([
            'status' => 'required|in:Dikirim,Diterima'
        ]);

        $item = PO::findOrFail($id_po);
        $item->status = $request->status;
 
        $item->save();
        return redirect()->route('purchase-order.index')->with('messagekirim','Data Pembelian Berhasil dikirim ke Supplier');
    }
}

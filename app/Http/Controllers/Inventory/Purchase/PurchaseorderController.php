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
            'Akun','Supplier','Pegawai'
        ])->get();

        $today = Carbon::now()->isoFormat('dddd');
        $tanggal = Carbon::now()->format('j F Y');

        return view('pages.inventory.purchase.po.po', compact('po','today','tanggal'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $po = PO::with([
            'Akun','Supplier','Pegawai'
        ])->get();

        $id = PO::getId();
        foreach($id as $value);
        $idlama = $value->id_po;
        $idbaru = $idlama + 1;
        $blt = date('m');

        $kode_po = 'PO-'.$idbaru.'/'.$blt;

        $akun = Akun::all();    
        $supplier = Supplier::all();
        $sparepart = Sparepart::all();
        $pegawai = Pegawai::all();

        return view('pages.inventory.purchase.po.create', compact('po','sparepart','supplier','akun','pegawai','kode_po'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = PO::getId();
        foreach($id as $value);
        $idlama = $value->id_po;
        $idbaru = $idlama + 1;
        $blt = date('m');

        $kode_po = 'PO-'.$idbaru.'/'.$blt;

        $po = new PO;
        $po->kode_po = $kode_po;
        $po->id_pegawai = $request->id_pegawai;
        $po->id_akun = $request->id_akun;
        $po->id_supplier = $request->id_supplier;
        $po->tanggal_po = $request->tanggal_po;
        $po->approve_po = $request->approve_po;
        $po->approve_ap = $request->approve_ap;
        $po->status = $request->status;
        $po->keterangan_owner = $request->keterangan_owner;
        $po->keterangan_ap = $request->keterangan_ap;

        $po->save();
        $po->Detailsparepart()->sync($request->sparepart);
        
        // return $request;
        return response()->json($request);
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
        //
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

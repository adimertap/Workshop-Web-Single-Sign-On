<?php

namespace App\Http\Controllers\Inventory\Purchase;

use App\Http\Controllers\Controller;
use App\Model\Accounting\Akun;
use App\Model\Inventory\Purchase\PO;
use App\Model\Inventory\Sparepart;
use App\Model\Inventory\Supplier;
use App\Model\Kepegawaian\Pegawai;
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

        return view('pages.inventory.purchase.po.po', compact('po'));
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


        $supplier = Supplier::all();
        $sparepart = Sparepart::all();

        return view('pages.inventory.purchase.po.create', compact('po','sparepart','supplier'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_po)
    {
        $po = PO::with('Detail.Sparepart.Hargasparepart')->findOrFail($id_po);

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

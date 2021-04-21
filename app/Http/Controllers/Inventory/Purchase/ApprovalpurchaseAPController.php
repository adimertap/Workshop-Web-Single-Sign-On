<?php

namespace App\Http\Controllers\Inventory\Purchase;

use App\Http\Controllers\Controller;
use App\Http\Requests\Inventory\Purchase\POrequest;
use App\Model\Inventory\Purchase\PO;
use Illuminate\Http\Request;

class ApprovalpurchaseAPController extends Controller
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

        return view('pages.inventory.purchase.approvalpoap.approvalpoap', compact('po'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $po = PO::with('Detailsparepart')->findOrFail($id_po);
        // dd($po);

        return view('pages.inventory.purchase.approvalpoap.detail')->with([
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
    public function destroy($id)
    {
        //
    }

    public function setStatus(Request $request, $id_po)
    {
        $request->validate([
            'status' => 'required|in:Approved,Not Approved,Pending'
        ]);

        $item = PO::findOrFail($id_po);
        $item->approve_ap = $request->status;
        $item->keterangan_ap = $request->keterangan_ap;

        $item->save();
        return redirect()->route('approvalpoap');
    }
}

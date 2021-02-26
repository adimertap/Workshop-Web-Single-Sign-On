<?php

namespace App\Http\Controllers\Inventory\Rcv;

use App\Http\Controllers\Controller;
use App\Model\Inventory\Rcv\Rcv;
use Illuminate\Http\Request;

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
            'PO','Pegawai','Supplier','Akun','FOP'
        ])->get();

        return view('pages.inventory.rcv.rcv', compact('rcv'));
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
    public function destroy($id_rcv)
    {
        $rcv = Rcv::findOrFail($id_rcv);
        
        $rcv->delete();

        return redirect()->back()->with('messagehapus','Data Penerimaan Berhasil dihapus');
    }
}
<?php

namespace App\Http\Controllers\FrontOffice\MasterData;

use App\Http\Controllers\Controller;
use App\Model\Inventory\Hargasparepart;
use App\Model\Inventory\Sparepart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HargaJualSparepartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sparepart = Sparepart::where('stock', '>', 0)->with('Hargasparepart')->get();
        $harga = Hargasparepart::where('id_bengkel', Auth::user()->id_bengkel)->get();
        // return $sparepart;
        return view('pages.frontoffice.masterdata.harga_jual.main', compact('sparepart', 'harga'));
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
    public function show($id)
    {
        //
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
    public function update(Request $request, $id_harga)
    {
        $harga = Hargasparepart::findOrFail($id_harga);
        $harga->harga_jual = $request->harga_jual;

        $harga->update();
        return $request;
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
}

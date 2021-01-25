<?php

namespace App\Http\Controllers\Inventory\Masterdata;

use App\Http\Controllers\Controller;
use App\Http\Requests\Inventory\Konversirequest;
use App\Model\Inventory\Konversi;
use Illuminate\Http\Request;

class MasterdatakonversiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $konversi = Konversi::get();

        return view('pages.inventory.masterdata.konversi', compact('konversi'));
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
    public function store(Konversirequest $request)
    {
        $konversi = new Konversi;
        $konversi->satuan = $request->satuan;
        // $rak=Rak::all()

        $konversi->save();
        return redirect()->back()->with('messageberhasil','Data Satuan Berhasil ditambahkan');
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
    public function update(Konversirequest $request, $id_konversi)
    {
        $konversi = Konversi::findOrFail($id_konversi);
        $konversi->satuan = $request->satuan;
        
        $konversi->save();
        return redirect()->back()->with('messageberhasil','Data Satuan Berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_konversi)
    {
        $konversi = Konversi::findOrFail($id_konversi);
        $konversi->delete();

        return redirect()->back()->with('messagehapus','Data Satuan Berhasil dihapus');
    }
}

<?php

namespace App\Http\Controllers\FrontOffice;

use App\Http\Controllers\Controller;
use App\Http\Requests\FrontOffice\MasterData\Diskonrequest;
use Illuminate\Http\Request;
use App\Model\FrontOffice\MasterDataDiskon;

class MasterDataDiskonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $diskon = MasterDataDiskon::get();

        return view('pages.frontoffice.masterdata.diskon.index', compact('diskon'));
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
    public function store(Diskonrequest $request)
    {
        $data = $request->all();

        MasterDataDiskon::create($data);
        return redirect()->route('diskon.index')->with('messageberhasil', 'Data Jenis Kendaraan Berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MasterDataDiskon  $masterDataDiskon
     * @return \Illuminate\Http\Response
     */
    public function show(MasterDataDiskon $masterDataDiskon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MasterDataDiskon  $masterDataDiskon
     * @return \Illuminate\Http\Response
     */
    public function edit(MasterDataDiskon $masterDataDiskon)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MasterDataDiskon  $masterDataDiskon
     * @return \Illuminate\Http\Response
     */
    public function update(Diskonrequest $request, $id_diskon)
    {
        $diskon = MasterDataDiskon::findOrFail($id_diskon);
        $diskon->nama_diskon = $request->nama_diskon;
        $diskon->jumlah_diskon = $request->jumlah_diskon;
        $diskon->tanggal_mulai = $request->tanggal_mulai;
        $diskon->tanggal_selesai = $request->tanggal_selesai;

        $diskon->update();
        return redirect()->back()->with('messageberhasil', 'Data Diskon Berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MasterDataDiskon  $masterDataDiskon
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_diskon)
    {
        $diskon = MasterDataDiskon::findOrFail($id_diskon);
        $diskon->delete();

        return redirect()->back()->with('messagehapus', 'Data Jenis Diskon Berhasil dihapus');
    }
}

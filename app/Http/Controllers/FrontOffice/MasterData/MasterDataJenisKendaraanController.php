<?php

namespace App\Http\Controllers\FrontOffice\Masterdata;

use App\Http\Controllers\Controller;
use App\Http\Requests\FrontOffice\MasterData\JenisKendaraanRequest as MasterDataJenisKendaraanRequest;
use Illuminate\Http\Request;
use App\Model\FrontOffice\MasterDataJenisKendaraan;
use Illuminate\Support\Str;

class MasterDataJenisKendaraanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jenis_kendaraan = MasterDataJenisKendaraan::get();

        return view('pages.frontoffice.masterdata.jenis_kendaraan.index', compact('jenis_kendaraan'));
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
    public function store(MasterDataJenisKendaraanRequest $request)
    {
        $data = $request->all();

        MasterDataJenisKendaraan::create($data);
        return redirect()->route('jenis-kendaraan.index')->with('messageberhasil', 'Data Jenis Kendaraan Berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MasterDataJenisKendaraan  $masterDataJenisKendaraan
     * @return \Illuminate\Http\Response
     */
    public function show($masterDataJenisKendaraan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MasterDataJenisKendaraan  $masterDataJenisKendaraan
     * @return \Illuminate\Http\Response
     */
    public function edit($masterDataJenisKendaraan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MasterDataJenisKendaraan  $masterDataJenisKendaraan
     * @return \Illuminate\Http\Response
     */
    public function update(MasterDataJenisKendaraanRequest $request, $id_jenis_kendaraan)
    {
        $kendaraan = MasterDataJenisKendaraan::findOrFail($id_jenis_kendaraan);
        $kendaraan->jenis_kendaraan = $request->jenis_kendaraan;
        $kendaraan->keterangan = $request->keterangan;

        $kendaraan->update();
        return redirect()->back()->with('messageberhasil', 'Data Jenis Kendaraan Berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MasterDataJenisKendaraan  $masterDataJenisKendaraan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_jenis_kendaraan)
    {
        $kendaraan = MasterDataJenisKendaraan::findOrFail($id_jenis_kendaraan);
        $kendaraan->delete();

        return redirect()->back()->with('messagehapus', 'Data Jenis Kendaraan Berhasil dihapus');
    }
}

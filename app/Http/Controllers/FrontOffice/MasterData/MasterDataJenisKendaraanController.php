<?php

namespace App\Http\Controllers\FrontOffice\Masterdata;

use App\Http\Controllers\Controller;
use App\Http\Requests\FrontOffice\MasterData\JenisKendaraanrequest;
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
        $kendaraan = MasterDataJenisKendaraan::get();

        return view('pages.frontoffice.masterdata.jenis_kendaraan.main', compact('kendaraan'));
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
    public function store(JenisKendaraanrequest $request)
    {
        $data = $request->all();

        MasterDataJenisKendaraan::create($data);
        return redirect()->route('jeniskendaraan.index')->with('messageberhasil', 'Data Jenis Kendaraan Berhasil ditambahkan');
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
    public function update(JenisKendaraanrequest $request, $id_jenis_kendaraan)
    {
        $kendaraan = MasterDataJenisKendaraan::findOrFail($id_jenis_kendaraan);
        $kendaraan->kode_kendaraan = $request->kode_kendaraan;
        $kendaraan->nama_kendaraan = $request->nama_kendaraan;
        $kendaraan->jenis_kendaraan = $request->jenis_kendaraan;
        $kendaraan->merk_kendaraan = $request->merk_kendaraan;

        $kendaraan->update();
        return redirect()->back()->with('messageberhasil', 'Data Kendaraan Berhasil diubah');
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

<?php

namespace App\Http\Controllers\FrontOffice\MasterData;

use App\FrontOffice\MasterDataMerkKendaraan;
use App\Http\Controllers\Controller;
use App\Http\Requests\FrontOffice\MasterData\MerkKendaraanRequest;
use App\Model\FrontOffice\MasterDataJenisKendaraan;
use App\Model\FrontOffice\MasterDataMerkKendaraan as FrontOfficeMasterDataMerkKendaraan;
use Illuminate\Http\Request;

class MasterDataMerkKendaraanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $merk = FrontOfficeMasterDataMerkKendaraan::with(['jenis_kendaraan'])->get();
        // return $merk;
        $jenis_kendaraan = MasterDataJenisKendaraan::all();

        $id = FrontOfficeMasterDataMerkKendaraan::getId();
        foreach ($id as $value);
        $idlama = $value->id_merk_kendaraan;
        $idbaru = $idlama + 1;
        $blt = date('m');

        $kode_merk_kendaraan = 'MRKKD-' . $idbaru . '/' . $blt;

        return view('pages.frontoffice.masterdata.merk_kendaraan.index', compact('merk', 'jenis_kendaraan', 'kode_merk_kendaraan'));
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
    public function store(MerkKendaraanRequest $request)
    {
        $data = $request->all();

        $id = FrontOfficeMasterDataMerkKendaraan::getId();
        foreach ($id as $value);
        $idlama = $value->id_merk_kendaraan;
        $idbaru = $idlama + 1;
        $blt = date('m');

        $kode_merk_kendaraan = 'MRKKD-' . $idbaru . '/' . $blt;

        $merkkendaraan = new FrontOfficeMasterDataMerkKendaraan;
        $merkkendaraan->id_jenis_kendaraan = $request->id_jenis_kendaraan;
        $merkkendaraan->kode_merk_kendaraan = $kode_merk_kendaraan;
        $merkkendaraan->merk_kendaraan = $request->merk_kendaraan;
        $merkkendaraan->save();

        return redirect()->route('merk-kendaraan.index')->with('messageberhasil', 'Data Merk Kendaraan Berhasil ditambahkan');
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
    public function update(MerkKendaraanRequest $request, $id_merk_kendaraan)
    {
        $merk = FrontOfficeMasterDataMerkKendaraan::findOrFail($id_merk_kendaraan);
        $merk->kode_merk_kendaraan = $request->kode_merk_kendaraan;
        $merk->merk_kendaraan = $request->merk_kendaraan;
        $merk->id_jenis_kendaraan = $request->id_jenis_kendaraan;

        $merk->update();
        return redirect()->back()->with('messageberhasil', 'Data Merk Kendaraan Berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_merk_kendaraan)
    {
        $merk = FrontOfficeMasterDataMerkKendaraan::findOrFail($id_merk_kendaraan);
        $merk->delete();

        return redirect()->back()->with('messagehapus', 'Data Merk Kendaraan Berhasil dihapus');
    }
}

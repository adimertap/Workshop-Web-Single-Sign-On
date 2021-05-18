<?php

namespace App\Http\Controllers\FrontOffice\MasterData;

use App\Http\Controllers\Controller;
use App\Http\Requests\FrontOffice\MasterData\KendaraanRequest;
use App\Model\FrontOffice\MasterDataJenisKendaraan;
use App\Model\FrontOffice\MasterDataKendaraan;
use App\Model\FrontOffice\MasterDataMerkKendaraan;
use Illuminate\Http\Request;

class MasterDataKendaraanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kendaraan = MasterDataKendaraan::with(['merk_kendaraan', 'jenis_kendaraan'])->get();
        $jenis_kendaraan = MasterDataJenisKendaraan::all();
        $merk_kendaraan = MasterDataMerkKendaraan::all();


        return view('pages.frontoffice.masterdata.kendaraan.index', compact('kendaraan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $merk_kendaraan = MasterDataMerkKendaraan::all();
        $jenis_kendaraan = MasterDataJenisKendaraan::all();

        $id = MasterDataKendaraan::getId();
        foreach ($id as $value);
        $idlama = $value->id_kendaraan;
        $idbaru = $idlama + 1;
        $blt = date('m');

        $kode_kendaraan = 'KD-' . $blt . '/' . $idbaru;

        $id = MasterDataMerkKendaraan::getId();
        foreach ($id as $value);
        $idlama = $value->id_merk_kendaraan;
        $idbaru = $idlama + 1;
        $blt = date('m');

        $kode_merk_kendaraan = 'MRKKD-' . $idbaru . '/' . $blt;

        return view('pages.frontoffice.masterdata.kendaraan.create', compact('merk_kendaraan', 'jenis_kendaraan', 'kode_kendaraan', 'kode_merk_kendaraan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KendaraanRequest $request)
    {
        $data = $request->all();

        MasterDataKendaraan::create($data);
        return redirect()->route('kendaraan.index')->with('messageberhasil', 'Data Kendaraan Berhasil ditambahkan');
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
    public function edit($id_kendaraan)
    {
        // return $id_kendaraan;
        $item = MasterDataKendaraan::findOrFail($id_kendaraan);
        $jenis_kendaraan = MasterDataJenisKendaraan::all();
        $merk_kendaraan = MasterDataMerkKendaraan::all();

        return view('pages.frontoffice.masterdata.kendaraan.edit', [
            'item' => $item,
            'jenis_kendaraan' => $jenis_kendaraan,
            'merk_kendaraan' => $merk_kendaraan
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_kendaraan)
    {
        $kendaraan = MasterDataKendaraan::findOrFail($id_kendaraan);
        $kendaraan->id_jenis_kendaraan = $request->id_jenis_kendaraan;
        $kendaraan->id_merk_kendaraan = $request->id_merk_kendaraan;
        $kendaraan->kode_kendaraan = $request->kode_kendaraan;
        $kendaraan->nama_kendaraan = $request->nama_kendaraan;

        $kendaraan->save();

        return redirect()->route('kendaraan.index')->with('messageberhasil', 'Data Kendaraan Berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_kendaraan)
    {
        $kendaraan = MasterDataKendaraan::findOrFail($id_kendaraan);
        $kendaraan->delete();

        return redirect()->back()->with('messagehapus', 'Data Kendaraan Berhasil dihapus');
    }
}

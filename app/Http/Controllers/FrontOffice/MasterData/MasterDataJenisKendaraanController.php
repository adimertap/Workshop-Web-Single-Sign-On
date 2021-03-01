<?php

namespace App\Http\Controllers\FrontOffice\Masterdata;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\FrontOffice\MasterDataJenisKendaraan;

class MasterDataJenisKendaraanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jeniskendaraan = MasterDataJenisKendaraan::get();

        return view('pages.frontoffice.masterdata.jenis_kendaraan.main', compact('jeniskendaraan'));
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
    public function update(Request $request, $masterDataJenisKendaraan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MasterDataJenisKendaraan  $masterDataJenisKendaraan
     * @return \Illuminate\Http\Response
     */
    public function destroy($masterDataJenisKendaraan)
    {
        //
    }
}

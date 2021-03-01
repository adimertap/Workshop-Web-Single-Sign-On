<?php

namespace App\Http\Controllers\FrontOffice\Masterdata;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\FrontOffice\MasterDataJenisPerbaikan;

class MasterDataJenisPerbaikanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jenisperbaikan = MasterDataJenisPerbaikan::get();

        return view('pages.frontoffice.masterdata.jenis_perbaikan.main', compact('jenisperbaikan'));
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
     * @param  \App\MasterDataJenisPerbaikan  $masterDataJenisPerbaikan
     * @return \Illuminate\Http\Response
     */
    public function show(MasterDataJenisPerbaikan $masterDataJenisPerbaikan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MasterDataJenisPerbaikan  $masterDataJenisPerbaikan
     * @return \Illuminate\Http\Response
     */
    public function edit(MasterDataJenisPerbaikan $masterDataJenisPerbaikan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MasterDataJenisPerbaikan  $masterDataJenisPerbaikan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MasterDataJenisPerbaikan $masterDataJenisPerbaikan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MasterDataJenisPerbaikan  $masterDataJenisPerbaikan
     * @return \Illuminate\Http\Response
     */
    public function destroy(MasterDataJenisPerbaikan $masterDataJenisPerbaikan)
    {
        //
    }
}

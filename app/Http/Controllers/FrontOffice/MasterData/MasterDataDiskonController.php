<?php

namespace App\Http\Controllers\FrontOffice\Masterdata;

use App\Http\Controllers\Controller;
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

        return view('pages.frontoffice.masterdata.diskon.main', compact('diskon'));
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
    public function update(Request $request, MasterDataDiskon $masterDataDiskon)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MasterDataDiskon  $masterDataDiskon
     * @return \Illuminate\Http\Response
     */
    public function destroy(MasterDataDiskon $masterDataDiskon)
    {
        //
    }
}

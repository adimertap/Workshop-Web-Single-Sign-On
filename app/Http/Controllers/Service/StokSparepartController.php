<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use App\Model\Service\StokSparepart;
use Illuminate\Http\Request;

class StokSparepartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.service.stok_sparepart.main');
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
     * @param  \App\StokSparepart  $stokSparepart
     * @return \Illuminate\Http\Response
     */
    public function show(StokSparepart $stokSparepart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\StokSparepart  $stokSparepart
     * @return \Illuminate\Http\Response
     */
    public function edit(StokSparepart $stokSparepart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\StokSparepart  $stokSparepart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StokSparepart $stokSparepart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\StokSparepart  $stokSparepart
     * @return \Illuminate\Http\Response
     */
    public function destroy(StokSparepart $stokSparepart)
    {
        //
    }
}

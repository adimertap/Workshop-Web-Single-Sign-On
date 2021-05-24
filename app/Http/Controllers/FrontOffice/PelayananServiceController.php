<?php

namespace App\Http\Controllers\FrontOffice;

use App\Model\FrontOffice\PelayananService;
use App\Http\Controllers\Controller;
use App\Model\Service\PenerimaanService;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PelayananServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pelayanan = PenerimaanService::with(['customer_bengkel', 'kendaraan', 'pegawai', 'mekanik'])->get();

        // return $pelayanan;
        $now = Carbon::now();
        return view('pages.frontoffice.pelayanan_service.main', compact('pelayanan', 'now'));
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
     * @param  \App\PelayananService  $pelayananService
     * @return \Illuminate\Http\Response
     */
    public function show(PelayananService $pelayananService)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PelayananService  $pelayananService
     * @return \Illuminate\Http\Response
     */
    public function edit(PelayananService $pelayananService)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PelayananService  $pelayananService
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PelayananService $pelayananService)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PelayananService  $pelayananService
     * @return \Illuminate\Http\Response
     */
    public function destroy(PelayananService $pelayananService)
    {
        //
    }
}

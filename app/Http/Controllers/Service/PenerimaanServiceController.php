<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use App\Model\FrontOffice\CustomerBengkel;
use App\Model\FrontOffice\MasterDataKendaraan;
use App\Model\Service\PenerimaanService;
use Illuminate\Http\Request;

class PenerimaanServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $service_advisor = PenerimaanService::all();
        $kendaraan = MasterDataKendaraan::all();
        $customer_bengkel = CustomerBengkel::all();

        $id = PenerimaanService::getId();
        foreach ($id as $value);
        $idlama = $value->id_kendaraan;
        $idbaru = $idlama + 1;
        $blt = date('m');
        $kode_sa = 'SA-' . $blt . '/' . $idbaru;

        return view('pages.service.penerimaan_service.main', compact('service_advisor', 'kode_sa', 'kendaraan', 'customer_bengkel'));
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
     * @param  \App\PenerimaanService  $penerimaanService
     * @return \Illuminate\Http\Response
     */
    public function show(PenerimaanService $penerimaanService)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PenerimaanService  $penerimaanService
     * @return \Illuminate\Http\Response
     */
    public function edit(PenerimaanService $penerimaanService)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PenerimaanService  $penerimaanService
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PenerimaanService $penerimaanService)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PenerimaanService  $penerimaanService
     * @return \Illuminate\Http\Response
     */
    public function destroy(PenerimaanService $penerimaanService)
    {
        //
    }
}

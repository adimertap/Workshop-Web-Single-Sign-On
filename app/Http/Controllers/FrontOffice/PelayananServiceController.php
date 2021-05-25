<?php

namespace App\Http\Controllers\FrontOffice;

use App\Model\FrontOffice\PelayananService;
use App\Http\Controllers\Controller;
use App\Model\FrontOffice\MasterDataPitstop;
use App\Model\Service\PenerimaanService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $pitstop = MasterDataPitstop::where('id_bengkel', Auth::user()->id_bengkel)->get();
        // return $pelayanan;
        $now = Carbon::now();
        return view('pages.frontoffice.pelayanan_service.main', compact('pelayanan', 'now', 'pitstop'));
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
    public function store(Request $request, $id)
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
    public function update(Request $request, PenerimaanService $id_service_advisor)
    {
        // $pitstop = PenerimaanService::where('id_service_advisor', $id_service_advisor)->get();
        $pitstop = PenerimaanService::findOrFail($id_service_advisor);
        return $id_service_advisor;
    }

    public function status(Request $request, $id_service_advisor)
    {
        // $pitstop = PenerimaanService::where('id_service_advisor', $id_service_advisor)->get();
        $pitstop = PenerimaanService::findOrFail($id_service_advisor);
        return $id_service_advisor;
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

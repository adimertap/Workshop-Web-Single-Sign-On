<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use App\Model\Service\PenerimaanService;
use App\Model\Service\PengerjaanService;
use Illuminate\Http\Request;

class PengerjaanServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengerjaan = PenerimaanService::with(['customer_bengkel', 'kendaraan', 'pegawai', 'mekanik', 'pitstop'])->orderBy('id_service_advisor', 'DESC')->get();
        // return $pengerjaan;
        return view('pages.service.pengerjaan_service.main', compact('pengerjaan'));
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
     * @param  \App\PengerjaanService  $pengerjaanService
     * @return \Illuminate\Http\Response
     */
    public function show($id_service_advisor)
    {
        $pelayanan = PenerimaanService::with('kendaraan', 'customer_bengkel', 'mekanik','pitstop', 'detail_sparepart.Merksparepart','detail_sparepart.Jenissparepart',
        'detail_sparepart', 'detail_perbaikan', 'bengkel')->find($id_service_advisor);

        return view('pages.service.pengerjaan_service.show',compact('pelayanan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PengerjaanService  $pengerjaanService
     * @return \Illuminate\Http\Response
     */
    public function edit(PengerjaanService $pengerjaanService)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PengerjaanService  $pengerjaanService
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_service_advisor)
    {
        $selesai = PenerimaanService::findOrFail($id_service_advisor);
        $selesai->status = 'selesai_service';

        $selesai->update();
        return redirect()->back()->with('messageberhasil', 'Service berhasil diselesaikan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PengerjaanService  $pengerjaanService
     * @return \Illuminate\Http\Response
     */
    public function destroy(PengerjaanService $pengerjaanService)
    {
        //
    }
}

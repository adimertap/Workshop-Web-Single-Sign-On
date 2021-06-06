<?php

namespace App\Http\Controllers\PointOfSales\Pembayaran;

use App\Http\Controllers\Controller;
use App\Model\PointOfSales\LaporanService;
use App\Model\Service\PenerimaanService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PembayaranServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $service_selesai = PenerimaanService::with('kendaraan', 'customer_bengkel', 'detail_sparepart', 'detail_perbaikan', 'mekanik')->where([['status', '=', 'selesai_service']])->orderBy('id_service_advisor', 'DESC')->get();
        // return $service_selesai;
        return view('pages.pointofsales.pembayaran.pembayaran_service', compact('service_selesai'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_service_advisor)
    {
        $pembayaran_service = PenerimaanService::with('kendaraan', 'customer_bengkel', 'detail_sparepart', 'detail_perbaikan', 'bengkel')->findOrFail($id_service_advisor);
        // return $pembayaran_service;
        return view('pages.pointofsales.pembayaran.invoice_service', compact('pembayaran_service'));
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
    public function update(Request $request, $id_service_advisor)
    {
        $status_selesai = PenerimaanService::findOrFail($id_service_advisor);
        $status_selesai->status = 'selesai_pembayaran';
        $status_selesai->update();

        $laporan_service = new LaporanService;
        $laporan_service->tanggal_laporan = Carbon::now();
        $laporan_service->id_service_advisor = $id_service_advisor;
        $laporan_service->diskon = $request->diskon;
        $laporan_service->ppn = $request->ppn;
        $laporan_service->total_tagihan = $request->total_tagihan;
        $laporan_service->nominal_bayar = $request->nominal_bayar;
        $laporan_service->kembalian = $request->kembalian;
        $laporan_service->id_pegawai = Auth::user()->pegawai->id_pegawai;
        $laporan_service->id_bengkel = Auth::user()->bengkel->id_bengkel;

        $laporan_service->save();

        return $request;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

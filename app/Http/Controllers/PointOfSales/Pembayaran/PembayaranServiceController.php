<?php

namespace App\Http\Controllers\PointOfSales\Pembayaran;

use App\Http\Controllers\Controller;
use App\Model\Service\PenerimaanService;
use Illuminate\Http\Request;

class PembayaranServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $service_selesai = PenerimaanService::with('kendaraan', 'customer_bengkel', 'detail_sparepart', 'detail_perbaikan', 'mekanik')->where([['status', '=', 'selesai_service']])->get();
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
    public function update(Request $request, $id)
    {
        //
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

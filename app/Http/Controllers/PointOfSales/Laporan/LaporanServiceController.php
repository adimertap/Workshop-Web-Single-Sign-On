<?php

namespace App\Http\Controllers\PointOfSales\Laporan;

use App\Http\Controllers\Controller;
use App\Model\PointOfSales\LaporanService;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LaporanServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $laporan = LaporanService::with(['penerimaan_service.customer_bengkel', 'pegawai'])->orderBy('id_laporan_service','DESC')->get();
        return view('pages.pointofsales.laporan.laporan_service', compact('laporan'));
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
    public function show($id)
    {
        $service = LaporanService::with([
            'penerimaan_service.detail_sparepart', 'penerimaan_service.detail_perbaikan','pegawai','penerimaan_service','penerimaan_service.customer_bengkel'
        ])->find($id);

        return view('pages.pointofsales.laporan.detail_laporan',compact('service'));

        
        
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

    public function CetakPembayaran($id)
    {
        $laporan = LaporanService::with([
            'penerimaan_service.detail_sparepart', 'penerimaan_service.detail_perbaikan','pegawai','penerimaan_service','penerimaan_service.customer_bengkel'
        ])->find($id);

        $now = Carbon::now();

        return view('print.POS.cetak-invoice-service',compact('laporan','now'));

        
        
    }
}

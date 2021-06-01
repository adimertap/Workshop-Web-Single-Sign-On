<?php

namespace App\Http\Controllers\Accounting\Receiveable;

use App\Http\Controllers\Controller;
use App\Http\Controllers\PointOfSales\Pembayaran\PembayaranSparepartController;
use App\Model\Marketplace\Transaksi;
use App\Model\PointOfSales\LaporanPenjualanSparepart;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PemasukanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pemasukankasir = LaporanPenjualanSparepart::groupBy('tanggal_laporan','status_jurnal')->selectRaw('SUM(total_tagihan) as grand_total, tanggal_laporan, COUNT(id_laporan) as jumlah_transaksi, status_jurnal')->get();
        $transaksionline = Transaksi::groupBy('updated_at')->selectRaw('SUM(harga_total) as total_harga, updated_at, COUNT(id_transaksi_online) as jumlah_transaksi_online')->get();
        $today = Carbon::now()->isoFormat('dddd');
        $tanggal = Carbon::now()->format('j F Y');

        return view('pages.accounting.receiveable.pemasukan',['total_pemasukan' => LaporanPenjualanSparepart::sum('total_tagihan'), 'total_pemasukan_online' => Transaksi::sum('harga_total')], compact('today','tanggal','pemasukankasir','transaksionline'));
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
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($tanggal_laporan)
    {
        $detail = LaporanPenjualanSparepart::with(['penjualan_sparepart','service_advisor'])->where('tanggal_laporan', $tanggal_laporan)->get();
        
        return view('pages.accounting.receiveable.detailpemasukan', ['total_per_tanggal' => LaporanPenjualanSparepart::where('tanggal_laporan', $tanggal_laporan)->sum('total_tagihan')], compact('detail','tanggal_laporan'));
    }

    public function Pemasukanonline($updated_at)
    {
        $online = Transaksi::with(['Detailtransaksi'])->where('updated_at', $updated_at)->get();
        
        return view('pages.accounting.receiveable.detailonline', ['sub_total' => Transaksi::where('updated_at', $updated_at)->sum('harga_total')], compact('online','updated_at'));
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

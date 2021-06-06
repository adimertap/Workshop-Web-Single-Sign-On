<?php

namespace App\Http\Controllers\PointOfSales\Pembayaran;

use App\Http\Controllers\Controller;
use App\Model\FrontOffice\CustomerBengkel;
use App\Model\FrontOffice\PenjualanSparepart;
use App\Model\PointOfSales\LaporanPenjualanSparepart;
use App\Model\SingleSignOn\Bengkel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PembayaranSparepartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penjualan_sparepart = PenjualanSparepart::where([['status_bayar', '=', 'Belum Bayar']])->orderBy('id_penjualan_sparepart', 'DESC')->get();
        return view('pages.pointofsales.pembayaran.pembayaran_sparepart', compact('penjualan_sparepart'));
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
    public function show($id_penjualan_sparepart)
    {
        $pembayaran = PenjualanSparepart::with('Detailsparepart', 'Bengkel', 'Customer')->findOrFail($id_penjualan_sparepart);
        // return $pembayaran;
        return view('pages.pointofsales.pembayaran.invoice_sparepart', compact('pembayaran'));
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
    public function update(Request $request, $id_penjualan_sparepart)
    {
        $status = PenjualanSparepart::findOrFail($id_penjualan_sparepart);
        $status->status_bayar = 'Lunas';
        $status->update();

        $laporan_sparepart = new LaporanPenjualanSparepart;
        $laporan_sparepart->tanggal_laporan = Carbon::now();
        $laporan_sparepart->id_penjualan_sparepart = $id_penjualan_sparepart;
        $laporan_sparepart->diskon = $request->diskon;
        $laporan_sparepart->ppn = $request->ppn;
        $laporan_sparepart->total_tagihan = $request->total_tagihan;
        $laporan_sparepart->nominal_bayar = $request->nominal_bayar;
        $laporan_sparepart->kembalian = $request->kembalian;
        $laporan_sparepart->id_pegawai = Auth::user()->pegawai->id_pegawai;
        $laporan_sparepart->id_bengkel = Auth::user()->bengkel->id_bengkel;

        $laporan_sparepart->save();

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

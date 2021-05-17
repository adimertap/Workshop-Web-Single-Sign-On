<?php

namespace App\Http\Controllers\PointOfSales\Pembayaran;

use App\Http\Controllers\Controller;
use App\Model\FrontOffice\CustomerBengkel;
use App\Model\FrontOffice\PenjualanSparepart;
use App\Model\SingleSignOn\Bengkel;
use Illuminate\Http\Request;

class PembayaranSparepartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penjualan_sparepart = PenjualanSparepart::where([['status_bayar', '=', 'Belum Bayar']])->get();
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

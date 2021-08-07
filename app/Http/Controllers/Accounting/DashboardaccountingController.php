<?php

namespace App\Http\Controllers\Accounting;

use App\Http\Controllers\Controller;
use App\Model\Accounting\Payable\InvoicePayable;
use App\Model\Accounting\Prf\Prf;
use App\Model\Marketplace\Transaksi;
use App\Model\PointOfSales\LaporanPenjualanSparepart;
use App\Model\PointOfSales\LaporanService;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardaccountingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $today = Carbon::now()->isoFormat('dddd');
        $tanggal = Carbon::now()->format('j F Y');
        $now = Carbon::now();

        return view('pages.accounting.dashboard.dashboardaccounting',
        ['hutang_supplier' => InvoicePayable::where('status_prf','Belum Dibuat')->sum('total_pembayaran'),
        'pendapatan_penjualan' => LaporanPenjualanSparepart::sum('total_tagihan'),
        'pendapatan_service' => LaporanService::sum('total_tagihan'),
        'pendapatan_marketplace' => Transaksi::sum('harga_total'),
        'invoice' => InvoicePayable::count(),
        'invoice_prf_belum' => InvoicePayable::where('status_prf','Belum Dibuat')->count(),
        'invoice_prf_sudah' => InvoicePayable::where('status_prf','Sudah Dibuat')->count(),
        'prf' => Prf::count(),
        'prf_pending' => Prf::where('status_prf','Pending')->count(),
        'prf_approve' => Prf::where('status_prf','Approved')->count(),
        'prf_tolak' => Prf::where('status_prf','Not Approved')->count(),], compact('today','tanggal'));
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
        //
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

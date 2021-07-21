<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use App\Model\Inventory\Purchase\PO;
use App\Model\Inventory\Rcv\Rcv;
use App\Model\Inventory\Retur\Retur;
use App\Model\Inventory\Sparepart;
use App\Model\Inventory\Stockopname\Opname;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardinventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        

        return view('pages.inventory.dashboard.dashboardinventory',[
            'po' => PO::count(),
            'po_today' => PO::whereDate('tanggal_po', Carbon::today())->count(),
            'rcv' => Rcv::count(),
            'rcv_today' => Rcv::whereDate('tanggal_rcv', Carbon::today())->count(),
            'opname' => Opname::count(),
            'opname_today' => Opname::whereDate('tanggal_opname', Carbon::today())->count(),
            'retur' => Retur::count(),
            'retur_today' => Retur::whereDate('tanggal_retur', Carbon::today())->count(),
            'sparepart_akan_habis' => Sparepart::where('status_jumlah', 'Kurang')->count(),
            'sparepart_habis' => Sparepart::where('status_jumlah', 'Habis')->count(),
            'sparepart_kosong' => Sparepart::count(),


            'po_belum_datang' => PO::where('status','Dikirim')->count(),
            'poap_pending' => PO::where('approve_ap','Pending')->count(),
            'poap_approve' => PO::where('approve_ap','Approved')->count(),
            'poap_tolak' => PO::where('approve_ap','Not Approved')->count(),
            'po_pending' => PO::where('approve_po','Pending')->count(),
            'po_approve' => PO::where('approve_po','Approved')->count(),
            'po_tolak' => PO::where('approve_po','Not Approved')->count(),
            'opname_pending' => Opname::where('approve','Pending')->count(),
            'opname_approve' => Opname::where('approve','Approved')->count(),
            'opname_tolak' => Opname::where('approve','Not Approved')->count(),
            'today' => Carbon::now()->isoFormat('dddd'),
            'tanggal_tahun' => Carbon::now()->format('j F Y'),
            'sparepart' => Sparepart::all()
        ]);
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

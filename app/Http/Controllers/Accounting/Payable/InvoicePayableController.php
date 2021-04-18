<?php

namespace App\Http\Controllers\Accounting\Payable;

use App\Http\Controllers\Controller;
use App\Model\Accounting\Jenistransaksi;
use App\Model\Accounting\Payable\InvoicePayable;
use App\Model\Inventory\Rcv\Rcv;
use App\Model\Kepegawaian\Pegawai;
use Illuminate\Http\Request;

class InvoicePayableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoice = InvoicePayable::with([
            'Rcv.Detail','Rcv'
        ])->get();


        return view('pages.accounting.payable.invoice.invoice', compact('invoice'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $invoice = InvoicePayable::with([
            'Rcv.Detail','Rcv'
        ])->get();

        $jenis_transaksi = Jenistransaksi::all();
        $pegawai = Pegawai::all();
        $rcv = Rcv::all();

        $id = InvoicePayable::getId();
        foreach($id as $value);
        $idlama = $value->id_payable_invoice;
        $idbaru = $idlama + 1;
        $blt = date('m');

        $kode_invoice = 'INV-'.$idbaru.'/'.$blt;
        
        return view('pages.accounting.payable.invoice.create', compact('invoice','jenis_transaksi','pegawai','kode_invoice','rcv'));
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

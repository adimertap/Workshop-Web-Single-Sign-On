<?php

namespace App\Http\Controllers\Accounting\Jurnal;

use App\Http\Controllers\Controller;
use App\Model\Accounting\Jurnal\Jurnalpengeluaran;
use App\Model\Accounting\Payable\InvoicePayable;
use App\Model\Accounting\Payable\Pajak;
use App\Model\Accounting\Prf\Prf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JurnalPengeluaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jurnal = Jurnalpengeluaran::with(['Jenistransaksi','Invoicepayable','Prf','Pajak'])->get();
        $today = Carbon::now()->isoFormat('dddd');
        $tanggal = Carbon::now()->format('j F Y');

        return view('pages.accounting.jurnal.pengeluaran.jurnalpengeluaran',['total' => Jurnalpengeluaran::sum('grand_total')], compact('jurnal','today','tanggal'));
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
    public function update(Request $request, $id_payable_invoice)
    {
        $invoice = InvoicePayable::findOrFail($id_payable_invoice);

        $jurnal = new Jurnalpengeluaran;
        $jurnal->id_bengkel = $request['id_bengkel'] = Auth::user()->id_bengkel;
        $jurnal->id_jenis_transaksi = $invoice->id_jenis_transaksi;
        $jurnal->tanggal_jurnal = Carbon::now();
        $jurnal->id_payable_invoice = $invoice->id_payable_invoice;
        $jurnal->ref = $invoice->kode_invoice;
        $jurnal->keterangan = $invoice->deskripsi_invoice;
        $jurnal->grand_total = $invoice->total_pembayaran;
        $jurnal->jenis_jurnal = 'Invoice_Payable';
        $jurnal->save();

        $invoice->status_jurnal = 'Sudah Diposting';
        $invoice->save();

        return redirect()->back()->with('messagejurnal','Data Invoice Berhasil DiPosting ke Jurnal Pengeluaran');
    }

    public function Pajak(Request $request, $id_pajak)
    {

        $pajak = Pajak::findOrFail($id_pajak);

        $jurnal = new Jurnalpengeluaran;
        $jurnal->id_bengkel = $request['id_bengkel'] = Auth::user()->id_bengkel;
        $jurnal->id_jenis_transaksi = $pajak->id_jenis_transaksi;
        $jurnal->tanggal_jurnal = Carbon::now();
        $jurnal->id_pajak = $pajak->id_pajak;
        $jurnal->ref = $pajak->kode_pajak;
        $jurnal->keterangan = $pajak->deskripsi_pajak;
        $jurnal->grand_total = $pajak->total_pajak;
        $jurnal->jenis_jurnal = 'Pajak';
        $jurnal->save();

        $pajak->status_jurnal = 'Sudah Diposting';
        $pajak->save();
       
        return redirect()->back()->with('messagejurnal','Data Pajak Berhasil DiPosting ke Jurnal Pengeluaran');
    }

    public function Prf(Request $request, $id_prf)
    {

        $prf = Prf::findOrFail($id_prf);

        $jurnal = new Jurnalpengeluaran;
        $jurnal->id_bengkel = $request['id_bengkel'] = Auth::user()->id_bengkel;
        $jurnal->id_jenis_transaksi = $prf->id_jenis_transaksi;
        $jurnal->tanggal_jurnal = Carbon::now();
        $jurnal->id_prf = $prf->id_prf;
        $jurnal->ref = $prf->kode_prf;
        $jurnal->keterangan = $prf->keperluan_prf;
        $jurnal->grand_total = $prf->grand_total;
        $jurnal->jenis_jurnal = 'Prf';
        $jurnal->save();

        $prf->status_jurnal = 'Sudah Diposting';
        $prf->save();
       
        return redirect()->back()->with('messagejurnal','Data PRF Berhasil DiPosting ke Jurnal Pengeluaran');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_jurnal_pengeluaran)
    {
        $jurnal = Jurnalpengeluaran::findOrFail($id_jurnal_pengeluaran);
        $jurnal->delete();

        return redirect()->back()->with('messagehapus','Data Jurnal Berhasil dihapus');
    }
}

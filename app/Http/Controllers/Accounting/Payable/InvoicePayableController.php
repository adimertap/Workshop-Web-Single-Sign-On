<?php

namespace App\Http\Controllers\Accounting\Payable;

use App\Http\Controllers\Controller;
use App\Model\Accounting\Jenistransaksi;
use App\Model\Accounting\Payable\InvoicePayable;
use App\Model\Accounting\Payable\InvoicePayabledetail;
use App\Model\Inventory\Rcv\Rcv;
use App\Model\Kepegawaian\Pegawai;
use Carbon\Carbon;
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

        $rcv = Rcv::with([
            'PO'
        ])->where([['status_invoice', '=', 'Belum diBuat']])->get();

       

        $jenis_transaksi = Jenistransaksi::all();
        $today = Carbon::now()->isoFormat('dddd');
        $tanggal = Carbon::now()->format('j F Y');

        return view('pages.accounting.payable.invoice.invoice',['hutang' => InvoicePayable::where('status_prf','Belum Dibuat')->sum('total_pembayaran')], 
        compact('invoice','today','tanggal','jenis_transaksi','rcv'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rcv = Rcv::where('kode_rcv',$request->kode_rcv)->first();
        $id_rcv = $rcv->id_rcv;
        $id_supplier = $rcv->id_supplier;
        $id_po = $rcv->id_po;

        $rcv->status_invoice = 'Sudah dibuat';
        $rcv->save();

        $invoice = InvoicePayable::create([
            'id_rcv'=>$id_rcv,
            'id_supplier'=>$id_supplier,
            'id_jenis_transaksi'=>$request->id_jenis_transaksi,
            'id_po' => $id_po,
           
        ]);
        
        return $invoice;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_payable_invoice)
    {
        $invoice = InvoicePayable::with('Detailinvoice')->findOrFail($id_payable_invoice);

        return view('pages.accounting.payable.invoice.detail')->with([
            'invoice' => $invoice
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $invoice = InvoicePayable::with([
            'Rcv.Detailrcv','Rcv','Jenistransaksi'
        ])->find($id);

        $id = InvoicePayable::getId();
        $blt = date('y-m');
        $kode_invoice = 'INVC-'.$blt.'/'.$invoice->id_payable_invoice;

        $jenis_transaksi = Jenistransaksi::all();
        $pegawai = Pegawai::all();
        $rcv = Rcv::all();

        // $id = InvoicePayable::getId();
        // $blt = date('y-m');

        // $kode_invoice = 'INVC-'.$blt.'/'.$invoice->id_payable_invoice;

        // $id = InvoicePayable::getId();
        // foreach($id as $value);
        // $idlama = $value->id_payable_invoice;
        // $idbaru = $idlama + 1;
        // $blt = date('m');

        // $kode_invoice = 'INVC-'.'/'.$blt.$idbaru;

        return view('pages.accounting.payable.invoice.create', compact('invoice','jenis_transaksi','pegawai','kode_invoice','rcv'));
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
        $invoice->kode_invoice = $request->kode_invoice;
        $invoice->tanggal_invoice = $request->tanggal_invoice;
        $invoice->tenggat_invoice = $request->tenggat_invoice;
        $invoice->deskripsi_invoice = $request->deskripsi_invoice;
        $invoice->total_pembayaran = $request->total_pembayaran;

        $invoice->status_prf ='Belum diBuat';
        $invoice->status_jurnal ='Belum diPosting';    
        $invoice->save();
        
        $invoice->Detailinvoice()->sync($request->sparepart);
        return $request;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_payable_invoice)
    {
        $invoice = InvoicePayable::findOrFail($id_payable_invoice);
        InvoicePayabledetail::where('id_payable_invoice', $id_payable_invoice)->delete();
        $invoice->delete();

        return redirect()->back()->with('messagehapus','Data Invoice Berhasil dihapus');
    }
}

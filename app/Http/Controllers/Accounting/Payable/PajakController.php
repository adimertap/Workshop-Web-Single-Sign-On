<?php

namespace App\Http\Controllers\Accounting\Payable;

use App\Http\Controllers\Controller;
use App\Model\Accounting\Jenistransaksi;
use App\Model\Accounting\Payable\Pajak;
use App\Model\Accounting\Payable\Pajakdetail;
use App\Model\Accounting\Payable\Pembayaranpajak;
use App\Model\Kepegawaian\Pegawai;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PajakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pajak = Pajak::with([
            'Pegawai','Jenistransaksi'
        ])->get();

        $today = Carbon::now()->isoFormat('dddd');
        $tanggal = Carbon::now()->format('j F Y');

        return view('pages.accounting.payable.pajak.pajak', compact('pajak','today','tanggal'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $pajak = Pajak::with([
            'detailpajak',
        ])->get();

        $jenis_transaksi = Jenistransaksi::all();
        $pegawai = Pegawai::all();
        $detailpajak = Pajakdetail::all();

        $id = Pajak::getId();
        foreach($id as $value);
        $idlama = $value->id_pajak;
        $idbaru = $idlama + 1;
        $blt = date('m');

        $kode_pajak = 'AKPJ-'.$idbaru.'/'.$blt;
        $id_pajak = $idbaru;

        return view('pages.accounting.payable.pajak.create', compact('id_pajak','jenis_transaksi','pegawai','kode_pajak','pajak', 'detailpajak')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $id = Pajak::getId();
        foreach($id as $value);
        $idlama = $value->id_pajak;
        $idbaru = $idlama + 1;
        $blt = date('m');

        $kode_pajak = 'AKPJ-'.$idbaru.'/'.$blt;

        $pajak = new Pajak;
        $pajak->kode_pajak = $kode_pajak;
        $pajak->id_jenis_transaksi = $request->id_jenis_transaksi;
        $pajak->id_pegawai = $request->id_pegawai;
        $pajak->tanggal_bayar = $request->tanggal_bayar;
        $pajak->deskripsi_pajak = $request->deskripsi_pajak;
        $pajak->total_pajak = $request->total_pajak;
        $pajak->status_jurnal = 'Pending';

        $pajak->save();
        
        $pajak->detailpajak()->insert($request->pajak);
        return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_pajak)
    {
        $pajak = Pajak::with('Detail')->findOrFail($id_pajak);

        return view('pages.accounting.payable.pajak.detail')->with([
            'pajak' => $pajak
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

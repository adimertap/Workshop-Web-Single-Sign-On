<?php

namespace App\Http\Controllers\Accounting\Payable;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Inventory\Accounting\Payable\Pajak;
use App\Model\Accounting\Jenistransaksi;
use App\Model\Accounting\Payable\Bayarpajak;
use App\Model\Accounting\Payable\Pajak as PayablePajak;
use App\Model\Accounting\Payable\Pajakdetail;
use App\Model\Accounting\Payable\Pembayaranpajak;
use App\Model\Kepegawaian\Pegawai;
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
        $pajak = Bayarpajak::with([
            'Pegawai','Jenistransaksi'
        ])->get();

        return view('pages.accounting.payable.pajak.pajak', compact('pajak'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jenis_transaksi = Jenistransaksi::all();
        $pegawai = Pegawai::all();

        $id = Bayarpajak::getId();
        foreach($id as $value);
        $idlama = $value->id_pajak;
        $idbaru = $idlama + 1;
        $blt = date('m');

        $kode_pajak = 'AKPJ-'.$idbaru.'/'.$blt;

        return view('pages.accounting.payable.pajak.create', compact('jenis_transaksi','pegawai','kode_pajak')); 
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
    public function show($id_pajak)
    {
        $pajak = Bayarpajak::with('Detail')->findOrFail($id_pajak);

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

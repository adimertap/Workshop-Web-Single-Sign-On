<?php

namespace App\Http\Controllers\Accounting\Payable;

use App\Http\Controllers\Controller;
use App\Model\Accounting\Bankaccount;
use App\Model\Accounting\Fop;
use App\Model\Accounting\Jenistransaksi;
use App\Model\Accounting\Prf\Prf;
use App\Model\Inventory\Supplier;
use App\Model\Kepegawaian\Pegawai;
use Illuminate\Http\Request;

class PrfController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prf = Prf::with([
            'Jenistransaksi','Supplier','FOP','Akunbank'
        ])->get();

        return view('pages.accounting.payable.prf.prf', compact('prf'));
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
        $supplier = Supplier::all();
        $fop = Fop::all();
        $akun_bank = Bankaccount::all();

        $id = Prf::getId();
        foreach($id as $value);
        $idlama = $value->id_prf;
        $idbaru = $idlama + 1;
        $blt = date('m');

        $kode_prf = 'AKPRF-'.$idbaru.'/'.$blt;

        return view('pages.accounting.payable.prf.create', compact('jenis_transaksi','pegawai','supplier','fop','akun_bank','kode_prf')); 
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

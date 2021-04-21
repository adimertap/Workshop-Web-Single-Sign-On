<?php

namespace App\Http\Controllers\Accounting\Masterdata;

use App\Http\Controllers\Controller;
use App\Http\Requests\Accounting\Bankaccountrequest;
use App\Model\Accounting\Bankaccount;
use Illuminate\Http\Request;

class MasterdatabankaccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bankaccount = Bankaccount::get();

        $id = Bankaccount::getId();
        foreach($id as $value);
        $idlama = $value->id_bank_account;
        $idbaru = $idlama + 1;
        $blt = date('m');

        $kode_bank = 'AKBA/'.'/'.$blt.$idbaru;

        return view('pages.accounting.masterdata.bankaccount', compact('bankaccount','kode_bank'));
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
    public function store(Bankaccountrequest $request)
    {
        
        $id = Bankaccount::getId();
        foreach($id as $value);
        $idlama = $value->id_bank_account;
        $idbaru = $idlama + 1;
        $blt = date('m');

        $kode_bank = 'AKBA/'.'/'.$blt.$idbaru;

        $bankaccount = new Bankaccount;
        $bankaccount->nama_bank = $request->nama_bank;
        $bankaccount->kode_bank = $kode_bank;
        $bankaccount->nama_account = $request->nama_account;
        $bankaccount->jenis_account = $request->jenis_account;
        $bankaccount->nomor_rekening = $request->nomor_rekening;
        $bankaccount->alamat_account = $request->alamat_account;
        // $rak=Rak::all()
        
        $bankaccount->save();
        return redirect()->back()->with('messageberhasil','Data Bank Account Berhasil ditambahkan');
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
    public function update(Bankaccountrequest $request, $id_bank_account)
    {
        $bankaccount = Bankaccount::findOrFail($id_bank_account);
        $bankaccount->nama_bank = $request->nama_bank;
        $bankaccount->nama_account = $request->nama_account;
        $bankaccount->jenis_account = $request->jenis_account;
        $bankaccount->nomor_rekening = $request->nomor_rekening;
        $bankaccount->alamat_account = $request->alamat_account;

        $bankaccount->update();
        return redirect()->back()->with('messageberhasil','Data Bank Account Berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_bank_account)
    {
        $bankaccount = Bankaccount::findOrFail($id_bank_account);
        $bankaccount->delete();

        return redirect()->back()->with('messagehapus','Data Bank Account Berhasil dihapus');
    }
}

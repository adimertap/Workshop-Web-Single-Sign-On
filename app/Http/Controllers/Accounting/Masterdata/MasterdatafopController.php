<?php

namespace App\Http\Controllers\Accounting\Masterdata;

use App\Http\Controllers\Controller;
use App\Http\Requests\Accounting\Foprequest;
use App\Model\Accounting\Fop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MasterdatafopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fop = Fop::get();
        $id = Fop::getId();
        foreach($id as $value);
        $idlama = $value->id_fop;
        $idbaru = $idlama + 1;
        $blt = date('m');

        $kode_fop = 'AKFOP-'.'/'.$blt.$idbaru;

        return view('pages.accounting.masterdata.fop', compact('fop','kode_fop'));
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
    public function store(Foprequest $request)
    {
        $id = Fop::getId();
        foreach($id as $value);
        $idlama = $value->id_fop;
        $idbaru = $idlama + 1;
        $blt = date('m');

        $kode_fop = 'AKFOP-'.'/'.$blt.$idbaru;

        $fop = new Fop;
        $fop->id_bengkel = $request['id_bengkel'] = Auth::user()->id_bengkel;
        $fop->nama_fop = $request->nama_fop;
        $fop->kode_fop = $kode_fop;
        
        // $rak=Rak::all()

        $fop->save();
        return redirect()->back()->with('messageberhasil','Data Form of Payment Berhasil ditambahkan');
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
    public function update(Foprequest $request, $id_fop)
    {
        $fop = Fop::findOrFail($id_fop);
        $fop->nama_fop = $request->nama_fop;
        
        $fop->update();
        return redirect()->back()->with('messageberhasil','Data Form of Payment Berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_fop)
    {
        $fop = Fop::findOrFail($id_fop);
        $fop->delete();

        return redirect()->back()->with('messagehapus','Data Form of Payment Berhasil dihapus');
    }
}

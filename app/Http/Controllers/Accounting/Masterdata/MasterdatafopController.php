<?php

namespace App\Http\Controllers\Accounting\Masterdata;

use App\Http\Controllers\Controller;
use App\Http\Requests\Accounting\Foprequest;
use App\Model\Accounting\Fop;
use Illuminate\Http\Request;

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

        return view('pages.accounting.masterdata.fop', compact('fop'));
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
        $fop = new Fop;
        $fop->nama_fop = $request->nama_fop;
        
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
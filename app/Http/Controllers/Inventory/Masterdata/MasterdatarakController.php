<?php

namespace App\Http\Controllers\Inventory\Masterdata;

use App\Http\Controllers\Controller;
use App\Http\Requests\Inventory\Rakrequest;
use App\Model\Inventory\Rak;
use Illuminate\Http\Request;

class MasterdatarakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rak = Rak::get();
        
        return view('pages.inventory.masterdata.raksparepart', compact('rak'));
        
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
    public function store(Rakrequest $request)
    {
        $rak = new Rak;
        $rak->kode_rak = $request->kode_rak;
        $rak->nama_rak = $request->nama_rak;
        $rak->jenis_rak = $request->jenis_rak;
        
        // $rak=Rak::all()

        $rak->save();
        return redirect()->back()->with('messageberhasil','Data Rak Berhasil ditambahkan');
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
    public function update(Rakrequest $request, $id_rak)
    {
        $rak = Rak::findOrFail($id_rak);
        $rak->kode_rak = $request->kode_rak;
        $rak->nama_rak = $request->nama_rak;
        $rak->jenis_rak = $request->jenis_rak;
        
        $rak->save();
        return redirect()->back()->with('messageberhasil','Data Rak Berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_rak)
    {
        $rak = Rak::findOrFail($id_rak);
        $rak->delete();

        return redirect()->back()->with('messagehapus','Data Rak Berhasil dihapus');
    }
}

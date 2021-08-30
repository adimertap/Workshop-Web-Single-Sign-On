<?php

namespace App\Http\Controllers\Inventory\Masterdata;

use App\Http\Controllers\Controller;
use App\Http\Requests\Inventory\Masterdata\Rakrequest as MasterdataRakrequest;
use App\Http\Requests\Inventory\Rakrequest;
use App\Model\Inventory\Gudang;
use App\Model\Inventory\Rak;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
class MasterdatarakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 
        $rak = Rak::with('gudang')->get();
        $gudang = Gudang::get();

        $id = Rak::getId();
        foreach($id as $value);
        $idlama = $value->id_rak;
        $idbaru = $idlama + 1;
        $idbengkel = Auth::user()->id_bengkel;

        $kode_rak = 'RKSP-'.$idbengkel.'/'.$idbaru;
        
        return view('pages.inventory.masterdata.raksparepart', compact('rak','kode_rak','gudang'));
        
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
    public function store(MasterdataRakrequest $request)
    {
        // $id = Rak::getId();
        // foreach($id as $value);
        // $idlama = $value->id_rak;
        // $idbaru = $idlama + 1;
        // $blt = date('m');

        // $kode_rak = 'RKSP-'.$blt.'/'.$idbaru;

        $rak = new Rak;
        $rak->kode_rak = $request->kode_rak;
        $rak->id_bengkel = $request['id_bengkel'] = Auth::user()->id_bengkel;
        $rak->nama_rak = $request->nama_rak;
        $rak->jenis_rak = $request->jenis_rak;
        $rak->id_gudang = $request->id_gudang;
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
    public function update(Request $request, $id_rak)
    {

        $rak = Rak::findOrFail($id_rak);
        $rak->kode_rak = $request->kode_rak;
        $rak->nama_rak = $request->nama_rak;
        $rak->jenis_rak = $request->jenis_rak;
        $rak->id_gudang = $request->id_gudang;
        
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

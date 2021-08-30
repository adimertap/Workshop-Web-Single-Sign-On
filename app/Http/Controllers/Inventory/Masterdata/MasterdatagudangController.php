<?php

namespace App\Http\Controllers\Inventory\Masterdata;

use App\Http\Controllers\Controller;
use App\Model\Inventory\Gudang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MasterdatagudangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gudang = Gudang::all();

        $id = Gudang::getId();
        foreach($id as $value);
        $idlama = $value->id_gudang;
        $idbengkel = Auth::user()->id_bengkel;
        $idbaru = $idlama + 1;

        $kode_gudang = 'WH-'.$idbengkel.'/'.$idbaru;

        return view('pages.inventory.masterdata.gudang', compact('gudang','kode_gudang'));
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
        $request['id_bengkel'] = Auth::user()->id_bengkel;
        $data = $request->all();
       
        Gudang::create($data);
        return redirect()->back()->with('messageberhasil','Data Gudang Berhasil ditambahkan');
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
    public function update(Request $request, $id_gudang)
    {
        $gudang = Gudang::findOrFail($id_gudang);
        $gudang->kode_gudang = $request->kode_gudang;
        $gudang->nama_gudang = $request->nama_gudang;
        $gudang->alamat_gudang = $request->alamat_gudang;
        
        $gudang->save();
        return redirect()->back()->with('messageberhasil','Data Gudang Berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_gudang)
    {
        $gudang = Gudang::findOrFail($id_gudang);
        $gudang->delete();

        return redirect()->back()->with('messagehapus','Data Gudang Berhasil dihapus');
    }
}

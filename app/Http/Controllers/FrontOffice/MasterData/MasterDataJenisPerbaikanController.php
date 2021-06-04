<?php

namespace App\Http\Controllers\FrontOffice\Masterdata;

use App\Http\Controllers\Controller;
use App\Http\Requests\FrontOffice\MasterData\JenisPerbaikanrequest;
use Illuminate\Http\Request;
use App\Model\FrontOffice\MasterDataJenisPerbaikan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class MasterDataJenisPerbaikanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jenisperbaikan = MasterDataJenisPerbaikan::get();

        $id = MasterDataJenisPerbaikan::getId();
        foreach ($id as $value);
        $idlama = $value->id_jenis_perbaikan;
        $idbaru = $idlama + 1;
        $blt = date('m');

        $kode_jenis_perbaikan = 'JP-' . $idbaru . '/' . $blt;

        return view('pages.frontoffice.masterdata.jenis_perbaikan.index', compact('jenisperbaikan', 'kode_jenis_perbaikan'));
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
    public function store(JenisPerbaikanrequest $request)
    {
        $request['id_bengkel'] = Auth::user()->id_bengkel;
        $data = $request->all();
        $data['slug'] = Str::slug($request->group_jenis_perbaikan);

        MasterDataJenisPerbaikan::create($data);
        return redirect()->route('jenis-perbaikan.index')->with('messageberhasil', 'Data Jasa Perbaikan Berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MasterDataJenisPerbaikan  $masterDataJenisPerbaikan
     * @return \Illuminate\Http\Response
     */
    public function show(MasterDataJenisPerbaikan $masterDataJenisPerbaikan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MasterDataJenisPerbaikan  $masterDataJenisPerbaikan
     * @return \Illuminate\Http\Response
     */
    public function edit($masterDataJenisPerbaikan)
    {
        // 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MasterDataJenisPerbaikan  $masterDataJenisPerbaikan
     * @return \Illuminate\Http\Response
     */
    public function update(JenisPerbaikanrequest $request, $id_jenis_perbaikan)
    {
        $jenisperbaikan = MasterDataJenisperbaikan::findOrFail($id_jenis_perbaikan);
        $jenisperbaikan->kode_jenis_perbaikan = $request->kode_jenis_perbaikan;
        $jenisperbaikan->nama_jenis_perbaikan = $request->nama_jenis_perbaikan;
        $jenisperbaikan->group_jenis_perbaikan = $request->group_jenis_perbaikan;
        $jenisperbaikan->harga_jenis_perbaikan = $request->harga_jenis_perbaikan;

        $jenisperbaikan->update();
        return redirect()->back()->with('messageberhasil', 'Data perbaikan Berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MasterDataJenisPerbaikan  $masterDataJenisPerbaikan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_jenis_perbaikan)
    {
        $jenisperbaikan = MasterDataJenisPerbaikan::findOrFail($id_jenis_perbaikan);
        $jenisperbaikan->delete();

        return redirect()->back()->with('messagehapus', 'Data Merk Berhasil dihapus');
    }
}

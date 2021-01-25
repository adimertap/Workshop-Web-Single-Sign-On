<?php

namespace App\Http\Controllers\Kepegawaian\Masterdata;

use App\Http\Controllers\Controller;
use App\Http\Requests\Kepegawaian\Jeniscutirequest;
use App\Model\Kepegawaian\Jeniscuti;
use Illuminate\Http\Request;

class MasterdatajeniscutiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jeniscuti = Jeniscuti::get();

        return view('pages.kepegawaian.masterdata.jeniscuti', compact('jeniscuti'));
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
    public function store(Jeniscutirequest $request)
    {
        $jeniscuti = new Jeniscuti;
        $jeniscuti->nama_cuti = $request->nama_cuti;
        $jeniscuti->jumlah_hari = $request->jumlah_hari;
        // $rak=Rak::all()

        $jeniscuti->save();
        return redirect()->back()->with('messageberhasil','Data Jenis Cuti Berhasil ditambahkan');
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
    public function update(Jeniscutirequest $request, $id_jenis_cuti)
    {
        $jeniscuti = Jeniscuti::findOrFail($id_jenis_cuti);
        $jeniscuti->nama_cuti = $request->nama_cuti;
        $jeniscuti->jumlah_hari = $request->jumlah_hari;
        
        $jeniscuti->save();
        return redirect()->back()->with('messageberhasil','Data Jenis Cuti Berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_jenis_cuti)
    {
        $jeniscuti = Jeniscuti::findOrFail($id_jenis_cuti);
        $jeniscuti->delete();

        return redirect()->back()->with('messagehapus','Data Jenis Cuti Berhasil dihapus');
    }
}

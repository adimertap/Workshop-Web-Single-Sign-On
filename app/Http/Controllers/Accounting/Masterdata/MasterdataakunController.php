<?php

namespace App\Http\Controllers\Accounting\Masterdata;

use App\Http\Controllers\Controller;
use App\Http\Requests\Accounting\Akunrequest;
use App\Model\Accounting\Akun;
use Illuminate\Http\Request;

class MasterdataakunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $akun = Akun::get();

        return view('pages.accounting.masterdata.akun', compact('akun'));
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
    public function store(Akunrequest $request)
    {
        $akun = new Akun;
        $akun->kode_akun = $request->kode_akun;
        $akun->nama_akun = $request->nama_akun;
        $akun->akun_grup = $request->akun_grup;
        
        // $rak=Rak::all()

        $akun->save();
        return redirect()->back()->with('messageberhasil','Data Akun Berhasil ditambahkan');
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
    public function update(Akunrequest $request, $id_akun)
    {
        $akun = Akun::findOrFail($id_akun);
        $akun->kode_akun = $request->kode_akun;
        $akun->nama_akun = $request->nama_akun;
        $akun->akun_grup = $request->akun_grup;
        
        $akun->update();
        return redirect()->back()->with('messageberhasil','Data Akun Berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_akun)
    {
        $akun = Akun::findOrFail($id_akun);
        $akun->delete();

        return redirect()->back()->with('messagehapus','Data Akun Berhasil dihapus');
    }
}

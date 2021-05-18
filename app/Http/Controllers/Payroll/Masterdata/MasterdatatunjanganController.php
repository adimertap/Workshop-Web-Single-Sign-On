<?php

namespace App\Http\Controllers\Payroll\Masterdata;

use App\Http\Controllers\Controller;
use App\Http\Requests\Payroll\Mastertunjanganrequest;
use App\Model\Payroll\Mastertunjangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MasterdatatunjanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tunjangan = Mastertunjangan::get();

        return view('pages.payroll.masterdata.tunjangan', compact('tunjangan'));
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
    public function store(Mastertunjanganrequest $request)
    {
        $tunjangan = new Mastertunjangan;
        $tunjangan->id_bengkel = $request['id_bengkel'] = Auth::user()->id_bengkel;
        $tunjangan->nama_tunjangan = $request->nama_tunjangan;
        $tunjangan->jumlah_tunjangan = $request->jumlah_tunjangan;
        $tunjangan->keterangan = $request->keterangan;
        // $rak=Rak::all()

        $tunjangan->save();
        return redirect()->back()->with('messageberhasil','Data Tunjangan Berhasil ditambahkan');
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
    public function update(Request $request, $id_tunjangan)
    {
        $tunjangan = Mastertunjangan::findOrFail($id_tunjangan);
        $tunjangan->nama_tunjangan = $request->nama_tunjangan;
        $tunjangan->jumlah_tunjangan = $request->jumlah_tunjangan;
        $tunjangan->keterangan = $request->keterangan;
        
        $tunjangan->update();
        return redirect()->back()->with('messageberhasil','Data Tunjangan Berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_tunjangan)
    {
        $tunjangan = Mastertunjangan::findOrFail($id_tunjangan);
        $tunjangan->delete();

        return redirect()->back()->with('messagehapus','Data Tunjangan Berhasil dihapus');
    }
}

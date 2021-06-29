<?php

namespace App\Http\Controllers\Accounting\Masterdata;

use App\Http\Controllers\Controller;
use App\Model\Accounting\Akun;
use App\Model\Accounting\Jenistransaksi;
use App\Model\Accounting\PenentuanAkun;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PenentuanAkunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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
    public function store(Request $request)
    {
      
        // return $request;
        $penentuanakun = PenentuanAkun::create([
            'id_akun'=> $request->id_akun,
            'id_jenis_transaksi' => $request->id_jenis_transaksi,
            'id_pasangan_akun'=> $request->id_pasangan_akun,
            'id_bengkel' => $request['id_bengkel'] = Auth::user()->id_bengkel
           
        ]);
        
        return redirect()->back();
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
    public function edit($id_jenis_transaksi)
    {
        $jenis_transaksi = Jenistransaksi::with('DetailPenentuanAkun')->find($id_jenis_transaksi);
        $akun = Akun::all();
        

        return view('pages.accounting.masterdata.detail_jenis_transaksi', compact('jenis_transaksi','akun'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_jenis_transaksi)
    {
        $penentuan_akun = new PenentuanAkun;
        $penentuan_akun->id_jenis_transaksi = $id_jenis_transaksi;
        $penentuan_akun->id_akun = $request->id_akun;
        $penentuan_akun->id_pasangan_akun = $request->id_pasangan_akun;
        $penentuan_akun->id_bengkel = $request['id_bengkel'] = Auth::user()->id_bengkel;
        
        $penentuan_akun->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers\Kepegawaian\Absensi;

use App\Http\Controllers\Controller;
use App\Model\Kepegawaian\Absensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanabsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      
       

        $absensi = Absensi::with([
            'Pegawai',
        ]);
        if($request->from){
            $absensi->where('tanggal_absensi', '>=', $request->from);
        }
        if($request->to){
            $absensi->where('tanggal_absensi', '<=', $request->to);
        }

        $absensi = $absensi->get();

        
        return view('pages.kepegawaian.absensi.laporanabsensi', compact('absensi'));


        
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
        //
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
    public function update(Request $request, $id)
    {
        //
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

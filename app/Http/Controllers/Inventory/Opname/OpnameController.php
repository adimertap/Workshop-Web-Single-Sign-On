<?php

namespace App\Http\Controllers\Inventory\Opname;

use App\Http\Controllers\Controller;
use App\Model\Inventory\Sparepart;
use App\Model\Inventory\Stockopname\Opname;
use App\Model\Kepegawaian\Pegawai;
use Carbon\Carbon;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Null_;

class OpnameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $opname = Opname::with([
            'Pegawai',
        ])->get();

        return view('pages.inventory.stockopname.stockopname',['today' => Carbon::now()->isoFormat('dddd'),
        'tanggal' => Carbon::now()->format('j F Y')], compact('opname'));
    }
// 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $opname = Opname::with([
            'Pegawai',
        ])->get();

        $id = Opname::getId();
        foreach($id as $value);
        $idlama = $value->id_opname;
        $idbaru = $idlama + 1;
        $blt = date('d-m-Y');

        $kode_opname = 'OP-'.$idbaru.'/'.$blt;
    

        $sparepart = Sparepart::all();
        $pegawai = Pegawai::all();
        

        return view('pages.inventory.stockopname.create', compact('opname','pegawai', 'sparepart', 'kode_opname'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = Opname::getId();
        foreach($id as $value);
        $idlama = $value->id_opname;
        $idbaru = $idlama + 1;
        $blt = date('d-m-Y');

        $kode_opname = 'OP-'.$idbaru.'/'.$blt;

        $opname = new Opname;
        $opname->id_pegawai = $request->id_pegawai;
        $opname->kode_opname = $kode_opname;
        $opname->tanggal_opname = $request->tanggal_opname;
        $opname->keterangan = $request->keterangan;
        $opname->approve =  $request->approve;

        $opname->save();
        $opname->Detailsparepart()->sync($request->sparepart);

        return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_opname)
    {
        $opname = Opname::with('Detailsparepart')->findOrFail($id_opname);

        return view('pages.inventory.stockopname.detail')->with([
            'opname' => $opname
        ]);
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

<?php

namespace App\Http\Controllers\Inventory\Opname;

use App\Http\Controllers\Controller;
use App\Model\Inventory\Sparepart;
use App\Model\Inventory\Stockopname\Opname;
use App\Model\Kepegawaian\Pegawai;
use Illuminate\Http\Request;

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

        return view('pages.inventory.stockopname.stockopname', compact('opname'));
    }

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

        $sparepart = Sparepart::all();
        $pegawai = Pegawai::all();

        return view('pages.inventory.stockopname.create', compact('opname','pegawai', 'sparepart'));
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
    public function show($id_opname)
    {
        $opname = Opname::with('Detail.Sparepart.Rak')->findOrFail($id_opname);

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

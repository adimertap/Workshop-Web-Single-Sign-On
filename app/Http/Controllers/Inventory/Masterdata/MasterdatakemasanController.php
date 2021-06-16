<?php

namespace App\Http\Controllers\Inventory\Masterdata;

use App\Http\Controllers\Controller;
use App\Http\Requests\Inventory\Kemasanrequest;
use App\Http\Requests\Inventory\Masterdata\Kemasanrequest as MasterdataKemasanrequest;
use App\Model\Inventory\Kemasan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MasterdatakemasanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kemasan = Kemasan::get();

        return view('pages.inventory.masterdata.kemasan', compact('kemasan'));
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
    public function store(MasterdataKemasanrequest $request)
    {
        $request['id_bengkel'] = Auth::user()->id_bengkel;
        $data = $request->all();
       
        Kemasan::create($data);
        return redirect()->back()->with('messageberhasil','Data Kemasan Berhasil ditambahkan');
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
    public function update(Request $request, $id_kemasan)
    {
        $kemasan = Kemasan::findOrFail($id_kemasan);
        $kemasan->nama_kemasan = $request->nama_kemasan;
        
        $kemasan->save();
        return redirect()->back()->with('messageberhasil','Data Kemasan Berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_kemasan)
    {
        $kemasan = Kemasan::findOrFail($id_kemasan);
        $kemasan->delete();

        return redirect()->back()->with('messagehapus','Data Kemasan Berhasil dihapus');
    }
}

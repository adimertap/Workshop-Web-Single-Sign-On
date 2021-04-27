<?php

namespace App\Http\Controllers\Inventory\Masterdata;
use App\Model\Inventory\Jenissparepart;
use App\Http\Controllers\Controller;
use App\Http\Requests\Inventory\Jenissparepartrequest;
use App\Http\Requests\Inventory\Merksparepartrequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MasterdatajenissparepartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jenissparepart = Jenissparepart::get();

        
        // Cek nilai merksparepart -> array
        // dd($jenissparepart); 

        return view('pages.inventory.masterdata.jenissparepart',compact('jenissparepart'));
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
    public function store(Jenissparepartrequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->jenis_sparepart);

        Jenissparepart::create($data);
        return redirect()->back()->with('messageberhasil','Data Jenis Sparepart Berhasil ditambahkan');
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
    public function update(Request $request, $id_jenis_sparepart)
    {
        $jenissparepart = Jenissparepart::findOrFail($id_jenis_sparepart);
        $jenissparepart->jenis_sparepart = $request->jenis_sparepart;
        $jenissparepart->keterangan = $request->keterangan;

        $jenissparepart->save();
        return redirect()->back()->with('messageberhasil','Data Jenis Sparepart Berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_jenis_sparepart)
    {
        $jenissparepart = Jenissparepart::findOrFail($id_jenis_sparepart);
        $jenissparepart->delete();

        return redirect()->back()->with('messagehapus','Data Jenis Sparepart Berhasil dihapus');
    }

}

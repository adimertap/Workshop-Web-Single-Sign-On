<?php

namespace App\Http\Controllers\Inventory\Masterdata;
use App\Http\Requests\Inventory\Merksparepartrequest;
use App\Model\Inventory\Merksparepart;
use App\Http\Controllers\Controller;
use App\Model\Inventory\Jenissparepart;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MasterdatamerksparepartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $merksparepart = Merksparepart::with([
            'jenissparepart'])->get();
        $jenis_sparepart = Jenissparepart::all();
        // // Cek nilai merksparepart -> array
        // // dd($merksparepart); 

        return view('pages.inventory.masterdata.merksparepart',compact('merksparepart','jenis_sparepart'));
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
    public function store(Merksparepartrequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->merk_sparepart);

        Merksparepart::create($data);
        return redirect()->route('merk-sparepart.index')->with('messageberhasil','Data Merk Sparepart Berhasil ditambahkan');
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
    public function edit($id_merk)
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
    public function update(Merksparepartrequest $request, $id_merk)
    {
        $merksparepart = Merksparepart::findOrFail($id_merk);
        $merksparepart->id_jenis_sparepart = $request->id_jenis_sparepart;
        $merksparepart->kode_merk = $request->kode_merk;
        $merksparepart->merk_sparepart = $request->merk_sparepart;

        $merksparepart->update();
        return redirect()->back()->with('messageberhasil','Data Merk Berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_merk)
    {
        $merksparepart = Merksparepart::findOrFail($id_merk);
        $merksparepart->delete();

        return redirect()->back()->with('messagehapus','Data Merk Berhasil dihapus');
    }

}

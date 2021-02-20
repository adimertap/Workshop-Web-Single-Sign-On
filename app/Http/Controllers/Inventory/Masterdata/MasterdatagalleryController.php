<?php

namespace App\Http\Controllers\Inventory\Masterdata;

use App\Http\Controllers\Controller;
use App\Http\Requests\Inventory\Galleryrequest;
use App\Http\Requests\Inventory\Sparepartrequest;
use App\Model\Inventory\Gallery;
use App\Model\Inventory\Sparepart;
use Illuminate\Http\Request;

class MasterdatagalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gallery = Gallery::with('sparepart')->get();

        return view('pages.inventory.masterdata.gallery.gallery')->with([
            'gallery' => $gallery
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sparepart = Sparepart::all();

        return view('pages.inventory.masterdata.gallery.create')->with([
            'sparepart' => $sparepart
        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Galleryrequest $request)
    {
    
        $data = $request->all();
        $data['photo'] = $request->file('photo')->store(
            'backend/src/assets/img','public'
        );

        Gallery::create($data);
        return redirect()->route('sparepart.index')->with('messageberhasil', 'Data Foto Sparepart Berhasil ditambahkan');

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
    public function destroy($id_gallery)
    {
        $gallery = Gallery::findOrFail($id_gallery);
        $gallery->delete();

        return redirect()->back()->with('messagehapus','Data Foto Sparepart Berhasil dihapus');
    }
}

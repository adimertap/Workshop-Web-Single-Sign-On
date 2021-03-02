<?php

namespace App\Http\Controllers\SingleSignOn\Manajemen;

use App\Http\Controllers\Controller;
use App\Model\SingleSignOn\ManajemenHakAkses;
use Illuminate\Http\Request;

class ManajemenHakAksesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.singlesignon.manajemen.hak_akses');
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
     * @param  \App\ManajemenHakAkses  $manajemenHakAkses
     * @return \Illuminate\Http\Response
     */
    public function show(ManajemenHakAkses $manajemenHakAkses)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ManajemenHakAkses  $manajemenHakAkses
     * @return \Illuminate\Http\Response
     */
    public function edit(ManajemenHakAkses $manajemenHakAkses)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ManajemenHakAkses  $manajemenHakAkses
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ManajemenHakAkses $manajemenHakAkses)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ManajemenHakAkses  $manajemenHakAkses
     * @return \Illuminate\Http\Response
     */
    public function destroy(ManajemenHakAkses $manajemenHakAkses)
    {
        //
    }
}

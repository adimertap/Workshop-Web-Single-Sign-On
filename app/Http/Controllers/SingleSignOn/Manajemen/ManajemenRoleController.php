<?php

namespace App\Http\Controllers\SingleSignOn\Manajemen;

use App\Http\Controllers\Controller;
use App\Model\SingleSignOn\ManajemenRole;
use Illuminate\Http\Request;

class ManajemenRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.singlesignon.manajemen.role');
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
     * @param  \App\ManajemenRole  $manajemenRole
     * @return \Illuminate\Http\Response
     */
    public function show(ManajemenRole $manajemenRole)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ManajemenRole  $manajemenRole
     * @return \Illuminate\Http\Response
     */
    public function edit(ManajemenRole $manajemenRole)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ManajemenRole  $manajemenRole
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ManajemenRole $manajemenRole)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ManajemenRole  $manajemenRole
     * @return \Illuminate\Http\Response
     */
    public function destroy(ManajemenRole $manajemenRole)
    {
        //
    }
}

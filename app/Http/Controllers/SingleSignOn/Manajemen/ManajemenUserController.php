<?php

namespace App\Http\Controllers\SingleSignOn\Manajemen;

use App\Http\Controllers\Controller;
use App\Model\SingleSignOn\ManajemenUser;
use App\User;
use Illuminate\Http\Request;

class ManajemenUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::ownership()->get();
        return view('pages.singlesignon.manajemen.user', compact('user'));
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ManajemenUser  $manajemenUser
     * @return \Illuminate\Http\Response
     */
    public function show(ManajemenUser $manajemenUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ManajemenUser  $manajemenUser
     * @return \Illuminate\Http\Response
     */
    public function edit(ManajemenUser $manajemenUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ManajemenUser  $manajemenUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ManajemenUser $manajemenUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ManajemenUser  $manajemenUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(ManajemenUser $manajemenUser)
    {
        //
    }
}

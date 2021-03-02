<?php

namespace App\Http\Controllers\FrontOffice;

use App\Model\FrontOffice\CustomerBengkel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerBengkelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.frontoffice.customer_terdaftar.main');
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
     * @param  \App\CustomerBengkel  $customerBengkel
     * @return \Illuminate\Http\Response
     */
    public function show(CustomerBengkel $customerBengkel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CustomerBengkel  $customerBengkel
     * @return \Illuminate\Http\Response
     */
    public function edit(CustomerBengkel $customerBengkel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CustomerBengkel  $customerBengkel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CustomerBengkel $customerBengkel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CustomerBengkel  $customerBengkel
     * @return \Illuminate\Http\Response
     */
    public function destroy(CustomerBengkel $customerBengkel)
    {
        //
    }
}

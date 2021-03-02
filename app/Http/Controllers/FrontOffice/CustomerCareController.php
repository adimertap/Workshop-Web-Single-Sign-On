<?php

namespace App\Http\Controllers\FrontOffice;

use App\Model\FrontOffice\CustomerCare;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerCareController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.frontoffice.customer_care.main');
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
     * @param  \App\CustomerCare  $customerCare
     * @return \Illuminate\Http\Response
     */
    public function show(CustomerCare $customerCare)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CustomerCare  $customerCare
     * @return \Illuminate\Http\Response
     */
    public function edit(CustomerCare $customerCare)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CustomerCare  $customerCare
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CustomerCare $customerCare)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CustomerCare  $customerCare
     * @return \Illuminate\Http\Response
     */
    public function destroy(CustomerCare $customerCare)
    {
        //
    }
}

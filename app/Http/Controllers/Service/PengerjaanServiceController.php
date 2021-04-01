<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use App\Model\Service\PengerjaanService;
use Illuminate\Http\Request;

class PengerjaanServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.service.pengerjaan_service.main');
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
     * @param  \App\PengerjaanService  $pengerjaanService
     * @return \Illuminate\Http\Response
     */
    public function show(PengerjaanService $pengerjaanService)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PengerjaanService  $pengerjaanService
     * @return \Illuminate\Http\Response
     */
    public function edit(PengerjaanService $pengerjaanService)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PengerjaanService  $pengerjaanService
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PengerjaanService $pengerjaanService)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PengerjaanService  $pengerjaanService
     * @return \Illuminate\Http\Response
     */
    public function destroy(PengerjaanService $pengerjaanService)
    {
        //
    }
}
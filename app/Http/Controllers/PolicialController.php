<?php

namespace App\Http\Controllers;

use App\Models\Policial;
use Illuminate\Http\Request;

class PolicialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return 'index';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $policial = Policial::create($request->all());
        dd($policial);
        return ['msg' => 'store'];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Policial  $policial
     * @return \Illuminate\Http\Response
     */
    public function show(Policial $policial)
    {
        return 'show';
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Policial  $policial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Policial $policial)
    {
        return 'update';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Policial  $policial
     * @return \Illuminate\Http\Response
     */
    public function destroy(Policial $policial)
    {
        return 'destroy';
    }
}

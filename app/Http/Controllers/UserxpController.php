<?php

namespace App\Http\Controllers;

use App\Models\Userxp;
use App\Models\hotels;
use App\Models\country;
use App\Http\Requests\Request;


class UserxpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Welcome user';
        return view('front.app', ['title' => $title]);
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
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Userxp  $userxp
     * @return \Illuminate\Http\Response
     */
    public function show(/*Userxp $userxp*/hotels $hotels,  country $country)
    {
        $title = 'the offering';
        $hotels = hotels::all();
        $country = country::all();
        return view('front.offerslist', ['hotels' => $hotels, 'country' => $country, 'title' => $title]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Userxp  $userxp
     * @return \Illuminate\Http\Response
     */
    public function edit(Userxp $userxp)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @param  \App\Models\Userxp  $userxp
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Userxp $userxp)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Userxp  $userxp
     * @return \Illuminate\Http\Response
     */
    public function destroy(Userxp $userxp)
    {
        //
    }
    public function add(Request $request)
    {
    }
}

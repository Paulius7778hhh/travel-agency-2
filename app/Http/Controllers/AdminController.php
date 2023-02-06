<?php

namespace App\Http\Controllers;

use App\Models\admin;
use Illuminate\Http\Request;
use App\Models\country;
use App\Models\hotels;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('back.app');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $country = new country;
        $country->title = $request->country;
        $country->date = $request->data;
        $country->save();
        return redirect()->route('admin-welcome');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createhotel(country $country)
    {
        $country = country::all()->sortBy('title');
        return view('back.addhotel', ['country' => $country]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storehotel(Request $request)
    {
        $hotels = new hotels;
        $hotels->title = $request->hotel;
        $hotels->picture = $request->hotel_picture;
        $hotels->trip_length = $request->trip_time;
        $hotels->country_id = $request->nation_id;
        $hotels->price = $request->trip_price;
        $hotels->save();
        return redirect()->route('admin-welcome');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(country $country)
    {
        $country = country::all()->sortBy('title');
        return view('back.countrylist', ['country' => $country]);
    }
    public function showhotel(hotels $hotels, country $country)
    {
        $hotels = hotels::all()->sortBy('title');
        $country = country::all()->sortBy('title');
        return view('back.hotellist', ['hotels' => $hotels, 'country' => $country]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(admin $admin)
    {
        //
    }
}

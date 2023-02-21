<?php

namespace App\Http\Controllers;

use App\Models\admin;
use Illuminate\Http\Request;
use App\Models\country;
use App\Models\hotels;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Welcome';
        return view('back.app', ['title' => $title]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Add Country';
        return view('back.create', ['title' => $title]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $start = Carbon::parse($request->s_start);
        $end = Carbon::parse($request->s_end);
        $diff = $start->diffInDays($end);
        country::insert([
            'title' => $request->country,
            'season_start' => $start,
            'season_end' => $end,
        ]);
        //$country = new country;
        //$country->title = $request->country;
        //$country->season_start = $request->s_start;
        //$country->season_end = $request->s_end;
        //$country->save();
        return redirect()->route('admin-welcome');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createhotel(country $country)
    {
        $title = 'Add Hotel';
        $country = country::all()->sortBy('title');
        return view('back.addhotel', ['country' => $country, 'title' => $title]);
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
        if ($request->file('hotel_picture')) {
            $picture = $request->file('hotel_picture');
            $ext = $picture->getClientOriginalExtension();

            $name = pathinfo($picture->getClientOriginalName(), PATHINFO_FILENAME);

            $file = $name . '-' . rand(100000, 999999) . '.' . $ext;

            $picture->move(public_path() . '/pictures/', $file);
            //$picture->move(public_path() . '/pictures/' . $file);
            $hotels->picture = '/pictures/' . $file;
        }

        $hotels->trip_length = $request->trip_time;
        $hotels->country_id = $request->nation_id;
        $hotels->price = $request->trip_price;
        $hotels->description = $request->description;
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
        $title = 'Countries list';
        $country = country::all()->sortBy('title');
        return view('back.countrylist', ['country' => $country, 'title' => $title]);
    }
    public function showhotel(hotels $hotels, country $country)
    {
        $title = 'Hotels list';
        $hotels = hotels::all()->sortBy('title');
        $country = country::all()->sortBy('title');
        return view('back.hotellist', ['hotels' => $hotels, 'country' => $country, 'title' => $title]);
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
    public function common()
    {
        if (Auth::user()?->role == 'user') {
            return redirect()->route('user-welcome');
        } else {
            return redirect()->route('admin-welcome');
        }
    }
}

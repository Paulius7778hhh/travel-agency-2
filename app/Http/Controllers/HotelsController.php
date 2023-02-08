<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\hotels;
use App\Models\country;


class HotelsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Models\hotels  $hotels
     * @return \Illuminate\Http\Response
     */
    public function show(hotels $hotels)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\hotels  $hotels
     * @return \Illuminate\Http\Response
     */
    public function edit(hotels $hotels)
    {
        $country = country::all();
        return view('back.edithotel', [
            'hotels' => $hotels,
            'country' => $country
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @param  \App\Models\hotels  $hotels
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, hotels $hotels)
    {
        $hotels->title = $request->edit_hotel;

        if ($request->file('hotel_picture')) {
            $picture = $request->file('hotel_picture');
            $ext = $picture->getClientOriginalExtension();

            $name = pathinfo($picture->getClientOriginalName(), PATHINFO_FILENAME);

            $file = $name . '-' . rand(100000, 999999) . '.' . $ext;
            //$manager = new ImageManager(['driver' => 'GD']);

            //$image = $manager->make($picture);
            //$image->crop(400, 600);
            $picture->move(public_path() . '/pictures/', $file);
            //$picture->move(public_path() . '/pictures/' . $file);

            $hotels->picture = '/pictures/' . $file;
        }
        $hotels->trip_length = $request->edit_trip_time;
        $hotels->country_id = $request->edit_nation_id;
        $hotels->price = $request->edit_trip_price;
        $hotels->save();
        return redirect()->route('admin-welcome');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\hotels  $hotels
     * @return \Illuminate\Http\Response
     */
    public function destroy(hotels $hotels)
    {
        $hotels->delete();
        return redirect()->back();
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\country;
use Carbon\Carbon;

class CountryController extends Controller
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
     * @param  \App\Models\country  $country
     * @return \Illuminate\Http\Response
     */
    public function show(country $country)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\country  $country
     * @return \Illuminate\Http\Response
     */
    public function edit(country $country)
    {
        $title = 'Edit Country';
        return view('back.editcountry', ['country' => $country, 'title' => $title]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @param  \App\Models\country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, country $country)
    {
        $country->title = $request->edit_country;
        $country->season_start = $request->edit_s_start;
        $country->season_end = $request->edit_s_end;
        $country->save();
        return redirect()->route('admin-welcome');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy(country $country)
    {
        if (!$country->hotels()->count()) {
            $country->delete();
            return redirect()->back();
        } else {
            return redirect()->back()->withErrors('dude wtf?');
        }
    }
}

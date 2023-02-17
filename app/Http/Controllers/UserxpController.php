<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Authenticate;
use App\Models\Userxp;
use App\Models\hotels;
use App\Models\country;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use App\Services\UserService;
use Illuminate\Support\Facades\Auth;


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
        $hotels = hotels::paginate(21);
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
    public function addtocart(Request $request, UserService $cart)
    {
        $id = (int) $request->ids;
        $count = (int) $request->count;
        $cart->add($id, $count);
        return redirect()->back();
    }
    public function viewlist(UserService $cart)
    {
        $title =  'List review';
        return view('front.viewlist', ['title' => $title, 'cart' => $cart->cartlist]);
    }
    public function updatecart(Request $request, UserService $cart)
    {
        if ($request->delete) {
            $cart->delete($request->delete);
            return redirect()->back();
        } else {

            $updatecart = array_combine($request->ids ?? [], $request->count ?? []);
            $cart->update($updatecart);
            return redirect()->back();
        }
    }
    public function makeorder(UserService $cart)
    {
        $order = new Order;
        $order->user_id = Auth::user()->id;
        $order->order_json = json_encode($cart->order());
        $order->save();
        $order->empty();
        return redirect()->route('front.app');
    }
}

<?php

namespace App\Http\Controllers;


use App\Models\Order;
use Illuminate\Http\Request;
use App\Mail\Ordershipped;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $title = 'Order list';
        $order = Order::orderby('created_at', 'desc')->get()->map(function ($hotels) {
            $hotels->hotel = json_decode($hotels->order_json);
            return $hotels;
        });

        return view('back.order-list', [
            'orderlist' => $order,
            'title' => $title,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $order->status = 1;
        $order->save();
        // $to = User::where('id', 'user_id')->get()[];
        // $to = User::where('id', 'user_id')->first();
        //$to = User::find($order->user_id);
        //Mail::to($to)->send(new OrderShipped($order));
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //if ($order->status == 0) {
        //    return redirect()->back()->withErrors('asss');
        //}


        $order->delete();

        return redirect()->back()->with('report', 'deletion success');
    }
}

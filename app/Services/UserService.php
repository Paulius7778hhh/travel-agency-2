<?php

namespace App\Services;

use App\Models\hotels;

class UserService
{
    private $cart, $cartlist, $total = 0, $count = 0;

    public function __construct()
    {
        $this->cart = session()->get('cart', []);
        $ids = array_keys($this->cart);
        $this->cartlist = hotels::wherein('id', $ids)->get()
            ->map(function ($hotels) {
                $hotels->count = $this->cart[$hotels->id];
                $hotels->sum = $hotels->price * $hotels->count;
                $this->total += $hotels->sum;
                return $hotels;
            });
        $this->count = $this->cartlist->count();
    }

    public function __get($name)
    {
        return match ($name) {
            'total' => $this->total,
            'cartlist' => $this->cartlist,
            'count' => $this->count,
            default => null
        };
    }
    public function add(int $id, int $count)
    {
        if (isset($this->cart[$id])) {
            $this->cart[$id] += $count;
        } else {
            $this->cart[$id] = $count;
        }
        session()->put('cart', $this->cart);
    }
    public function update(array $cart)
    {
        session()->put('cart', $cart);
    }
    public function help()
    {
        return 'yay';
    }
    public function delete(int $id)
    {
        unset($this->cart[$id]);
        session()->put('cart', $this->cart);
    }
    public function order()
    {
        $order = (object)[];
        $order->total = $this->total;
        $order->hotels = [];
        foreach ($this->cartlist as $hotel_order) {
            $order->hotels[] = (object)[
                'title' => $hotel_order->title,
                'count' => $hotel_order->count,
                'price' => $hotel_order->price,
                'id' => $hotel_order->id,
            ];
        }
        return $order;
    }
    public function empty()
    {
        session()->put('cart', []);
        $this->total = 0;
        $this->count = 0;
        $this->cartlist = collect();
        $this->cart = [];
    }
}

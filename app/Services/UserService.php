<?php

namespace App\Services;

use App\Models\hotels;

class UserService
{
    private $cart, $cartlist, $total = 0, $count = 0;

    public function __construct()
    {
        $this->cart = session()->get('cart', []);
        $ids = array_flip($this->cart);
        $this->cartlist = hotels::whereIn('id', $ids)
            ->get()
            ->map(function ($hotels) {
                $hotels->count = $this->cart[$hotels->id];
                $hotels->sum = $hotels->count * $hotels->price;
                $this->total += $hotels->sum;
                return $hotels;
            });
        $this->count = $this->cartlist->count();
    }
    public function __get($props)
    {
        return match ($props) {
            'total' => $this->total,
            'count' => $this->count,
            'list' => $this->cartList,
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

    public function help()
    {
        return 'yay';
    }
}

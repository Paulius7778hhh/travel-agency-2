@inject('cart', 'App\Services\UserService')

@extends('front.app')


@section('content')
    <form action="user-updatecart" method="post">
        @forelse($cart->cartlist as $value)
            <div>
                {{ $value->title }} <input type="number" name="count[]" min="1" value="{{ $value->count }}">
                <input type="hidden" name="ids[]" value="{{ $value->count }}"> X
                {{ $value->price }} =
                {{ $value->sum }}

            </div>

            <div>
                @if (isset($value->picture))
                    <br> <img style="width:300px; height:auto:" src="{{ asset($value->picture) }}">
                @endif
            </div>
            {{ $value->description }}
            <br>
            <br>
            <br>

            <br>
            <br>
            <br>

        @empty
            <li>empty</li>
        @endforelse
        <br>
        <br>
        <br>
        BUY FOR {{ $cart->total }} EUR
        <button type="submit">update</button>
        @csrf
    </form>
@endsection

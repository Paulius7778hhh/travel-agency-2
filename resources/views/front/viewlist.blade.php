@inject('cart', 'App\Services\UserService')

@extends('front.app')


@section('content')
<form action="{{route('user-updatecart')}}" method="post">
    @forelse($cart->cartlist as $hotel)
    <div>
        {{ $hotel->title }} <input type="number" name="count[]" min="1" value="{{ $hotel->count }}">
        <input type="hidden" name="ids[]" value="{{ $hotel->id }}"> X

        {{ $hotel->price }} =
        {{ $hotel->sum }}

    </div>

    <div>
        @if (isset($hotel->picture))
        <img style="width:300px; height:auto;" src="{{ asset($hotel->picture) }}">
        @endif
    </div>
    {{ $hotel->description }}
    <br>
    <br>
    <br>
    <button type="submit" name="delete" value="{{$hotel->id}}">delete</button>


    <br>
    <br>
    <br>

    @empty
    <li>empty</li>
    @endforelse
    <br>
    <br>
    <br>

    <button type="submit">update</button>
    @csrf
</form>
BUY FOR {{ $cart->total }} EUR

<form action="{{route('user-purchase')}}" method="post">

    <button type="submit">buy</button>


    @csrf
</form>

@endsection

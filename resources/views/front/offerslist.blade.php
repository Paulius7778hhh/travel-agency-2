@inject('cart', 'App\Services\UserService')

@extends('front.app')


@section('content')







@forelse($hotels as $key => $hotel)




<li class="list-group-item">From: {{$hotel->country->title}}<br> Hotel: {{$hotel->title}}<br>Season start {{$hotel->country->season_start}}<br>Season end {{$hotel->country->season_end}}<br> @if(isset($hotel->picture))<br> <img style="width:300px; height:auto:" src="{{asset($hotel->picture)}}">@endif<br> Trip length: {{$hotel->trip_length}}<br><textarea cols="30" rows="5" readonly>{{$hotel->description}}</textarea></li>




Price: {{$hotel->price}} EUR

<form action="{{route('user-addtocart',$hotel)}}" method="post">


    <input type="number" min="1" name="count" value="{{$hotel->count}}">


    <input type="hidden" name="ids" value="{{$hotel->id}}">
    <button type="submit">add</button>
    @csrf
</form>

@empty
<li></li>
@endempty












@endsection

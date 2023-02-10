@extends('front.app')

@section('content')


@forelse($hotels as $key => $hotel)



<li class="list-group-item">From: {{$hotel->country->title}}<br> Hotel: {{$hotel->title}}<br>Season start {{$hotel->country->season_start}}<br>Season end {{$hotel->country->season_end}}<br> @if(isset($hotel->picture))<br> <img src="{{asset($hotel->picture)}}">@endif<br> Trip length: {{$hotel->trip_length}}<br><textarea cols="30" rows="5" readonly>{{$hotel->description}}</textarea></li>




<form action="" method="post">Price: {{$hotel->price}} EUR<button type="submit">buy</button>@csrf</form>

<form action="" method="post"><button type="submit">add</button>@csrf</form>

@empty
<li></li>
@endempty












@endsection

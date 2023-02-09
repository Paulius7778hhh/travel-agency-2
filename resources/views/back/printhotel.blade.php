@extends('back.app')

@section('content')







<ul class="" style='translateX(-50%); margin:1% 0 0 25%; '>

    <li style="list-style: none;" class="list-group-item">From: </li>


    <li style="list-style: none;" class="list-group-item">Hotel: {{$hotels->title}}</li>

    <li style="list-style: none;" class="list-group-item">@if(isset($hotels->picture))Picture of hotel: <img src="{{asset($hotels->picture)}}">@endif</li>

    <li style="list-style: none;" class="list-group-item">Trip length: {{$hotels->trip_length}}</li>

    <li style="list-style: none;" class="list-group-item">Price: {{$hotels->price}} EUR </li>

    <li style="list-style: none;" class="list-group-item"><textarea cols="30" rows="5" readonly>{{$hotels->description}}</textarea></li>

</ul>
<a href="{{ route('admin-pdf', $hotels) }}">Download</a>

</form>

@endsection

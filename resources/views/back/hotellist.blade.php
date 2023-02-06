@extends('back.app')

@section('content')


<ul>




    @forelse($hotels as $key => $hotel)



    <li>{{$hotel->title}} {{$hotel->picture}} {{$hotel->trip_length}} {{$hotel->country->title}} {{$hotel->price}}</li>













    @empty
    <li style="list-style: none;"></li>

    @endempty









</ul>

@endsection

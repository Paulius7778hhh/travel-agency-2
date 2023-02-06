@extends('back.app')

@section('content')

<ul>
    @forelse($country as $key => $nation)


    <li>{{$nation->title}}</li>
    @empty
    <li style="list-style: none;"></li>

    @endempty









</ul>

@endsection

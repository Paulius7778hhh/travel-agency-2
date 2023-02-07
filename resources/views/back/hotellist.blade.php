@extends('back.app')

@section('content')


<ul class="list-group">




    @forelse($hotels as $key => $hotel)



    <li class="list-group-item">From: {{$hotel->country->title}}<br> Hotel: {{$hotel->title}} <br>Picture of hotel: {{$hotel->picture}}<br> Trip length: {{$hotel->trip_length}}<br> Price: {{$hotel->price}} EUR</li>

    <form action="{{route('admin-hdelete',$hotel)}}" method="post"><button type="submit">delete</button>@method('delete')@csrf</form>
    <form action="{{route('admin-edit',$hotel)}}" method="get"><button type="submit">edit</button>@csrf</form>




















    @empty
    <li style="list-style: none;"></li>

    @endempty









</ul>

@endsection

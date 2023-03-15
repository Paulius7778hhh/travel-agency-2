@extends('back.app')

@section('content')
    <ul class="" style='translateX(-50%); margin:1% 0 0 25%; '>
        @forelse($hotels as $key => $hotel)



            <li class="list-group-item">From: {{ $hotel->country->title }}<br> Hotel: {{ $hotel->title }}
                @if (isset($hotel->picture))
                    <br>Picture of hotel:
                    <img src="{{ asset('pictures/' . $hotel->picture) }}">
                @else
                    <br>Picture of hotel:
                    <img src="{{ asset('nopic.jpg') }}" height="300" width="300">
                @endif

                <br> Trip length: {{ $hotel->trip_length }}<br> Price: {{ $hotel->price }} EUR <br><br>
                <textarea cols="30" rows="5" readonly>{{ $hotel->description }}</textarea>
            </li>










            <form action="{{ route('admin-hdelete', $hotel) }}" method="post"><button
                    type="submit">delete</button>@method('delete')@csrf</form>
            <form action="{{ route('admin-edit', $hotel) }}" method="get"><button type="submit">edit</button>@csrf</form>
            <form action="{{ route('admin-hotel', $hotel) }}" method="get"><button type="submit">show</button>@csrf
            </form>





















        @empty
            <li style="list-style: none;"></li>

        @endempty









</ul>
@endsection

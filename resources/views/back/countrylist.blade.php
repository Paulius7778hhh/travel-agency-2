@extends('back.app')

@section('content')

@if (count($errors) > 0)
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<ul style='translateX(-50%); margin:1% 0 0 28%; '>

    @forelse($country as $key => $nation)


    <li>{{$nation->title}}<br> amount of hotels: {{$nation->hotels()->count()}}</li>


    <form action="{{route('admin-cdelete',$nation)}}" method="post"><button type="submit">delete</button>@method('delete')@csrf</form>
    <form action="{{route('admin-cedit',$nation)}}" method="get"><button type="submit">edit</button>@csrf</form>


    @empty
    <li style="list-style: none;"></li>



    @endempty









</ul>

@endsection

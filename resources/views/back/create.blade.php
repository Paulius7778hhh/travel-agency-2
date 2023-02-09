@extends('back.app')

@section('content')
<form class="card card-header col-md-5" style='translateX(-50%); margin:1% 0 0 28%; ' action="{{ route('admin-store') }}" method="post">

    <label for="country">Country name</label>
    <input type="text" name="country" value="{{old('country')}}">

    <label for="s_start">Season start</label>
    <input type="date" name="s_start" value="{{old('s_start')}}">

    <label for="s_end">Season end</label>
    <input type="date" name="s_end" value="{{old('s_end')}}">
    <button type='submit'>add</button>
    @csrf</form>


@endsection

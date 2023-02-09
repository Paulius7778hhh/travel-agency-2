@extends('back.app')

@section('content')
<form class="card card-header col-md-5" style='translateX(-50%); margin:1% 0 0 28%; ' action="{{ route('admin-cupdate',$country) }}" method="post"> <input type="text" name="edit_country" value="{{old('edit_country',$country->title)}}">





    <label for="edit_s_start">Season start</label>


    <input type="date" name="edit_s_start" value="{{old('edit_s_start',$country->season_start)}}">

    <label for="edit_s_end">Season end</label>



    <input type="date" name="edit_s_end" value="{{old('edit_s_end',$country->season_end)}}">

    <button type='submit'>edit</button>@method('put')@csrf</form>








@endsection

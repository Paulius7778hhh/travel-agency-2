@extends('back.app')

@section('content')
<form class="card card-header col-md-5" action="{{ route('admin-cupdate',$country) }}" method="post"> <input type="text" name="edit_country" value="{{old('edit_country',$country->title)}}">





    <input type="text" name="edit_data" value="{{old('edit_data',$country->date)}}"> <button type='submit'>edit</button>@method('put')@csrf</form>






@endsection

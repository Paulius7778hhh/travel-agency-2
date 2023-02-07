@extends('back.app')

@section('content')
<form class="card card-header col-md-5" action="{{ route('admin-cupdate',$country) }}" method="post"> <input type="text" name="edit_country" value="{{old('edit_country')}}">




    <input type="text" name="edit_data" value="{{old('data')}}"> <button type='submit'>edit</button>@method('put')@csrf</form>




@endsection

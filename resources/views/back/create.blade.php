@extends('back.app')

@section('content')
<form class="card card-header col-md-5" action="{{ route('admin-store') }}" method="post"> <input type="text" name="country" value="{{old('country')}}">



    <input type="text" name="data" value="{{old('data')}}"> <button type='submit'>add</button>@csrf</form>




@endsection

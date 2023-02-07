@extends('back.app')

@section('content')
<form class="card card-header col-md-5" action="{{ route('admin-update',$hotels) }}" method="post">



    <select class="form-select" name="edit_nation_id" aria-label="Default select example">
        <option selected>select country</option>


        @forelse($country as $key => $nation)




        <option value="{{$nation->id}}">{{$nation->title}}</option>




        @empty
        <option value="">none</option>

        @endforelse

    </select>
    <label for="edit_hotel">hotel name</label>
    <input type="text" name="edit_hotel" value="{{old('hotel')}}">




    <label for="edit_hotel_picture">hotel picture</label>
    <input type="text" name="edit_hotel_picture" value="{{old('hotel_picture')}}">
    <label for="edit_trip_time">trip_time</label>
    <input type="text" name="edit_trip_time" value="{{old('trip_time')}}">
    <label for="edit_trip_price">price</label>
    <input type="number" name="edit_trip_price" value="{{old('trip_price')}}">


    <button type='submit'>edit</button>@method('put')@csrf
</form>








@endsection

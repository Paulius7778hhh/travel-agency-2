@extends('back.app')

@section('content')
<form class="card card-header col-md-5" action="{{ route('admin-storehotel') }}" method="post">
    <select class="form-select" name="nation_id" aria-label="Default select example">
        <option selected>select country</option>


        @forelse($country as $key => $nation)




        <option value="{{$nation->id}}">{{$nation->title}}</option>




        @empty
        <option value="">none</option>

        @endforelse

    </select>
    <label for="hotel">hotel name</label>
    <input type="text" name="hotel" value="{{old('hotel')}}">




    <label for="hotel_picture">hotel picture</label>
    <input type="text" name="hotel_picture" value="{{old('hotel_picture')}}">
    <label for="trip_time">trip_time</label>
    <input type="text" name="trip_time" value="{{old('trip_time')}}">
    <label for="trip_price">price</label>
    <input type="number" name="trip_price" value="{{old('trip_price')}}">


    <button type='submit'>add</button>@csrf
</form>








@endsection

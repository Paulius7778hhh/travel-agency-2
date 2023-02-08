@extends('back.app')

@section('content')
<form class="card card-header col-md-5" action="{{ route('admin-update',$hotels) }}" method="post" enctype="multipart/form-data">




    <select class="form-select" name="edit_nation_id" aria-label="Default select example">



        @forelse($country as $key => $nation)




        <option value="{{old('edit_nation_id',$nation->id)}}">{{$nation->title}}</option>





        @empty
        <option value="">none</option>

        @endforelse

    </select>
    <label for="edit_hotel">hotel name</label>
    <input type="text" name="edit_hotel" value="{{old('edit_hotel',$hotels->title)}}">







    <label for="edit_hotel_picture">hotel picture</label>
    <input type="file" name="edit_hotel_picture">





    <label for="edit_trip_time">trip_time</label>
    <input type="text" name="edit_trip_time" value="{{old('edit_trip_time',$hotels->trip_length)}}">


    <label for="edit_trip_price">price</label>
    <input type="number" name="edit_trip_price" value="{{old('edit_trip_price',$hotels->price)}}">
    @if($hotels->picture)

    <div class="col-4">
        <div class="mb-3 img">
            <img src="{{asset($hotels->picture)}}">

        </div>
    </div>
    @endif

    @if($hotels->picture)

    <button type="submit" class="btn btn-outline-danger" name="delete_photo" value="1">Delete Photo</button>
    @endif



    <button type='submit'>edit</button>@method('put')@csrf
</form>









@endsection

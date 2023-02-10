@extends('back.app')

@section('content')
<form class="card card-header col-md-5" style='translateX:(-50%); margin:1% 0 0 28%; ' action="{{ route('admin-update',$hotels) }}" method="post" enctype="multipart/form-data">













    <p>Hotel in: {{$hotels->country->title}}</p>










    <label for="edit_hotel">hotel name</label>
    <p>{{old('edit_hotel',$hotels->title)}}</p>













    <label for="edit_trip_time">trip_time</label>
    <p>{{old('edit_trip_time',$hotels->trip_length)}}</p>


    <label for="edit_trip_price">price</label>
    <p>{{old('edit_trip_price',$hotels->price)}}</p>
    <label for="edit_description">description</label>

    <textarea class="form-control" type="text" name="edit_description" cols="30" rows="5" readonly>{{old('edit_description',$hotels->description)}}</textarea>

    @if($hotels->picture)

    <div class="col-4">
        <div class="mb-3 img">
            <img src="{{asset($hotels->picture)}}">

        </div>
    </div>
    @endif





    <a href="{{route('admin-pdf', $hotels)}}" class="btn btn-outline-primary">Download PDF</a>

</form>












@endsection

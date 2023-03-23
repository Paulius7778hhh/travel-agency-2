@extends('back.app')

@section('content')
    @if (Session::has('report'))
        <h2 class="alert alert-success" style="font-size: 30px;">{{ Session::pull('report') }}</h2>
    @endif
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="list-group-item" style="font-size: 30px;">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <ol class="list-group">
        @foreach ($orderlist as $key => $orders)
            <li class="list-group-item">
                {{ $orders->uid->name }}
            </li>
            @forelse($orders->hotel->hotels as $nrorder)
                <li>{{ $nrorder->title }} {{ $nrorder->count }} x {{ $nrorder->price }} =
                    {{ $nrorder->count * $nrorder->price }}</li>

            @empty
            @endforelse
            <form action="{{ route('order-edit', $orders->id) }}" method="post">
                <button type="submit" class="btn btn-outline-secondary">
                    @if ($orders->status == 0)
                        Waiting for Aproval
                    @else
                        Aproved
                    @endif
                </button>

                @csrf
                @method('PUT')
            </form>
            <form action="{{ route('order-delete', $orders->id) }}" method="post">
                <button type="submit" class="btn btn-outline-primary">
                    Delete
                </button>

                @csrf
                @method('delete')
            </form>
        @endforeach
    </ol>
@endsection
{{--
     
    --}}

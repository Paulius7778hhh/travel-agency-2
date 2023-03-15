@extends('back.app')

@section('content')
    <ol style='translateX(-50%); margin:1% 0 0 28%; '>
        {{--
        @forelse($orderlist as $key => $order)



            <li>
                {{ $order->user->name }}
                {{ $order->user_id }}<br>
                {{ $order->created_at }}<br>
                
                <br>
                @if ($order->status == '0')
                    <span style="background-color: red; border-style: solid 1px color black; color:aqua;"> Order Status:
                        Vaiting for aproval</span>
                @elseif($order->status == '1')
                    <span style="background-color: blue; border-style: solid 1px color purple; color:gold;">Order Status:
                        Approved</span>
                @endif
            </li>
--}}
        @forelse($orderlist as $key => $order)


            <li>

                @forelse ($order->hotels as $key => $hotel)
                    <ul>
                        <li>{{ $hotel->title }}</li>
                        <li>{{ $hotel->count }}</li>
                        <li>{{ $hotel->price }}</li>
                        <li>{{ $hotel->id }}</li>
                    </ul>
                @empty
                    <ul>
                        <li></li>
                    </ul>

                @endforelse

                {{ $order->total }}
            </li>
            <form action="" method="post"><button type="submit">delete</button>@method('delete')@csrf</form>
            <form action="" method="get"><button type="submit">deny</button>@csrf</form>
            <form action="" method="get"><button type="submit">approve</button>@csrf</form>


        @empty
            <li style="list-style: none;"></li>



        @endempty

</ol>
@endsection

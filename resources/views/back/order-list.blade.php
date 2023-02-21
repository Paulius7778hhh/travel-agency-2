@extends('back.app')

@section('content')

<ul style='translateX(-50%); margin:1% 0 0 28%; '>

    @forelse($orderlist as $key => $order)



    <li>
        {{$order->user_id}}<br>
        {{$order->created_at}}<br>
        {{$order->order_json}}<br>
        @if($order->status == '0')
        <span style="background-color: red; border-style: solid 1px color black; color:aqua;"> Order Status: Vaiting for aproval</span>
        @elseif($order->status == '1')
        <span style="background-color: blue; border-style: solid 1px color purple; color:gold;">Order Status: Approved</span>

        @endif
    </li>



    <form action="" method="post"><button type="submit">delete</button>@method('delete')@csrf</form>
    <form action="" method="get"><button type="submit">apply</button>@csrf</form>


    @empty
    <li style="list-style: none;"></li>



    @endempty

</ul>


@endsection

@extends('layouts.app-admin-panel')

@section('content')
    <div class="p-4 p-md-5 text-white rounded bg-secondary">
        <div class="px-0">
            <h1 class="display-4 fst-italic">Order ID: {{ $order->id }}</h1>
            <p class=>User ID: {{ $order->user_id }}</p>
        </div>
    </div>

    <table class="table table-bordered table-striped mt-3">
        <thead>
        <tr>
            <th>ID</th>
            <th>Image</th>
            <th>Title</th>
            <!--<th>Description</th>-->
            <th>Price</th>
            <th>Quantity</th>
        </tr>
        </thead>

        <tbody>
            @foreach($order->orderDetails as $items)
            <tr>
                <style>
                    .img-demo {
                        width: 70px;
                        height: 70px;
                    }
                </style>
                <td>{{$items->products->id}}</td>
                <td><img class="img-demo mx-auto d-block" src="/storage/images/{{$items->products->img}}"></td>
                <td>{{$items->products->title}}</td>
            <!--<td>4</td>-->
                <td>{{$items->products->price}}</td>
                <td>{{$items->quantity}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection

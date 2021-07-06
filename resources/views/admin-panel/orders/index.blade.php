@extends('layouts.app-admin-panel')

@section('content')
    @section('h1-text')
        Orders
    @endsection

    @section('btn-add-something')

    @endsection

    <table class="table table-bordered table-striped mt-3">
        <thead>
        <tr>
            <th>ID</th>
            <th>User ID</th>
            <th>Actions</th>
        </tr>
        </thead>

        <tbody>
        @foreach($orders as $order)
            <tr>
                <td>{{$order->id}}</td>
                <td>{{$order->user_id}}</td>
                <td>
                    <a href="{{ route('orders.show', $order->id) }}" class="btn btn-primary">Show</a>
                    <!--<form action="{{ route('product.destroy', $order->id) }}" method="post" style="display: inline;">
                        @csrf
                        <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger">
                            Delete
                        </button>
                    </form> -->
                </td>
            </tr>
        @endforeach
        </tbody>


    </table>
    {{ $orders->links() }}
@endsection

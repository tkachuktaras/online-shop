@extends('layouts.app')

@section('content')
    <div class="container">
        @include('inc.admin-panel-buttons')
    </div>


    <div class="container mt-3">
        <a href="{{ route('product.create') }}" class="btn btn-success">Add new Product</a>
        <table class="table table-bordered table-striped mt-3">
            <thead>
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Title</th>
                <!--<th>Description</th>-->
                <th>Price</th>
                <th>Quantity</th>
                <th>Category Id</th>
                <th>Actions</th>
            </tr>
            </thead>

            <tbody>
            @foreach($products as $product)
                <tr>
                    <style>
                        .img-demo {
                            width: 70px;
                            height: 70px;
                        }
                    </style>
                    <td>{{$product->id}}</td>
                    <td><img class="img-demo mx-auto d-block" src="/storage/images/{{$product->img}}"></td>
                    <td>{{$product->title}}</td>
                    <!--<td>{{$product->description}}</td>-->
                    <td>{{$product->price}} UAH per kg</td>
                    <td>{{$product->quantity}} pieces</td>
                    <td><a href="{{ route('category.show', $product->category_id) }}" class="link-primary">ID = {{$product->category_id}}</a></td>
                    <td>
                        <a href="{{ route('product.show', $product->id) }}" class="btn btn-primary">Show</a>
                        <a href="{{ route('product.edit', $product->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('product.destroy', $product->id) }}" method="post" style="display: inline;">
                            @csrf
                            <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>


        </table>
        {{ $products->links() }}
    </div>

@endsection

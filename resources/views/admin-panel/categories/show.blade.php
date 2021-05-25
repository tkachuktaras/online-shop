@extends('layouts.app')

@section('content')
    <div class="container">
        @include('inc.admin-panel-buttons')
    </div>


    <div class="container mt-3">
        <table class="table table-bordered table-striped mt-3">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
            </thead>

            <tbody>
                <tr>
                    <style>
                        .td_lol {
                            width: 60%;
                        }
                    </style>
                    <td>{{$categories->id}}</td>
                    <td>{{$categories->name}}</td>
                    <td class="td_lol">{{$categories->description}}</td>
                    <td>
                        <a href="{{ route('category.edit', $categories->id) }}" class="btn btn-warning">Edit</a>
                        <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger">
                                Delete
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>

        <table class="table table-bordered table-striped mt-3">
            <thead>
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Title</th>
                <!--<th>Description</th>-->
                <th>Price</th>
                <th>Quantity</th>
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
    </div>

@endsection

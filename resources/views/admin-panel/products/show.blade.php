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
                <th>Image</th>
                <th>Title</th>
                <th>Description</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Category Id</th>
                <th>Actions</th>
            </tr>
            </thead>

            <tbody>
                <tr>
                    <style>
                        .img-demo {
                            width: 70px;
                            height: 70px;
                        }
                        .description {
                            width: 39%;
                        }
                    </style>
                    <td>{{$product->id}}</td>
                    <td><img class="img-demo mx-auto d-block" src="/storage/images/{{$product->img}}"></td>
                    <td>{{$product->title}}</td>
                    <td class="description">{{$product->description}}</td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->quantity}}</td>
                    <td>{{$product->category_id}}</td>
                    <td>
                        <a href="{{ route('product.edit', $product->id) }}" class="btn btn-warning">Edit</a>
                        <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger">
                                Delete
                        </button>
                    </td>
                </tr>
            </tbody>


        </table>
    </div>

@endsection

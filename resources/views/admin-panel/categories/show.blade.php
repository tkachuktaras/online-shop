@extends('layouts.app-admin-panel')

@section('content')
    <div class="p-4 p-md-5 text-white rounded bg-secondary">
        <div class=" px-0">
            <h1 class="display-4 fst-italic">{{$category->name}}</h1>
            <p class=>{{$category->description}}</p>
            <a href="{{ route('category.edit', $category->id) }}" class="btn btn btn-outline-light">Edit</a>
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
    {{ $products->links() }}
@endsection

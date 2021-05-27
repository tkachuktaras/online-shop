@extends('layouts.app-admin-panel')

@section('content')

    @section('h1-text')
        Edit product
    @endsection

    <form action="{{ route('product.update', ['id' => $product->id]) }}" method="POST">
        @csrf
        <div>
            @include('layouts.errors')
        </div>
        <div>
            <div class="form-group">
                <label>Title</label>
                <input type="text" class="form-control" name="title" value="{{ $product->title }}">
            </div>
            <!--<div class="form-group">
                <label>Image</label>
                <input type="file" class="form-control-file" name="img" value="/storage/images/{{$product->img}}">
            </div>-->
            <div class="form-group">
                <label>Description</label>
                <textarea class="form-control" name="description">{{ $product->description }}</textarea>
            </div>
            <div class="form-group">
                <label>Price</label>
                <input type="text" class="form-control" name="price" value="{{ $product->price }}">
            </div>
            <div class="form-group">
                <label>Quantity</label>
                <input type="text" class="form-control" name="quantity" value="{{ $product->quantity }}">
            </div>
            <div class="form-group">
                <label>Category ID</label>
                <input type="text" class="form-control" name="category_id" value="{{ $product->category_id }}">
            </div>
        </div>
        <div>
            <button type="submit" class="btn btn-warning pull-right">Edit</button>
        </div>
    </form>
@endsection
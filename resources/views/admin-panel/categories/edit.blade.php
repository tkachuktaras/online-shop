@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('category.update', ['id' => $category->id]) }}" method="POST">
            @csrf
            <div>
                <h3 class="box-title">Edit Category</h3>
                @include('layouts.errors')
            </div>
            <div>
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" name="name" value="{{$category->name}}">
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control" name="description">{{$category->description}}</textarea>
                </div>
            </div>
            <div>
                <button class="btn btn-warning pull-right">Save</button>
            </div>
        </form>
    </div>
@endsection
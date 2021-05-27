@extends('layouts.app-admin-panel')

@section('content')
    @section('h1-text')
        Edit category
    @endsection

    <form action="{{ route('category.update', ['id' => $category->id]) }}" method="POST">
        @csrf
        <div>
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
@endsection
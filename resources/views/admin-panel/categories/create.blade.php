@extends('layouts.app-admin-panel')

@section('content')
    @section('h1-text')
        Create category
    @endsection

    @include('layouts.errors')

    <form action="{{ route('category.store') }}" method="post">
        @csrf
        <div>
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea class="form-control" name="description"></textarea>
            </div>
        </div>
        <div>
            <button type="submit" class="btn btn-warning pull-right">Add</button>
        </div>
    </form>
@endsection
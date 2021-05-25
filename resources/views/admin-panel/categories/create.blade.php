@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Create category</h2>
    </div>
    @include('layouts.errors')
    <div class="container">
        <form action="{{ route('category.store') }}" method="post">
            @csrf
            <div>
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" name="name">
                </div>
            </div>
            <div>
                <button type="submit" class="btn btn-warning pull-right">Add</button>
            </div>
        </form>
    </div>
@endsection
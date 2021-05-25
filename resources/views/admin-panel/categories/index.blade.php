@extends('layouts.app')

@section('content')
    <div class="container">
        @include('inc.admin-panel-buttons')
    </div>


    <div class="container mt-3">
        <a href="{{ route('category.create') }}" class="btn btn-success">Add new category</a>
        <table class="table table-bordered table-striped mt-3">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>
            </thead>

            <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{$category->id}}</td>
                    <td>{{$category->name}}</td>
                    <td>
                        <a href="{{ route('category.edit', $category->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('category.destroy', $category->id) }}" method="post" style="display: inline;">
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
        {{ $categories->links() }}
    </div>

@endsection

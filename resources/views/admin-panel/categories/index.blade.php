@extends('layouts.app-admin-panel')

@section('content')
    @section('h1-text')
        Category
    @endsection

    @section('btn-add-something')
        <a href="{{ route('category.create') }}" class="btn btn-outline-secondary">Create new category</a>
    @endsection

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
        @foreach($categories as $category)
            <tr>
                <style>
                    .td_lol {
                        width: 55%;
                    }
                </style>
                <td>{{$category->id}}</td>
                <td>{{$category->name}}</td>
                <td class="td_lol">{{$category->description}}</td>
                <td>
                    <a href="{{ route('category.show', $category->id) }}" class="btn btn-primary">Show</a>
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
@endsection
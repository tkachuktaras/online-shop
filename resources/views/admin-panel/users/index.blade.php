@extends('layouts.app')

@section('content')
    <div class="container">
        @include('inc.admin-panel-buttons')
    </div>


    <div class="container mt-3">
        <a href="{{ route('user.create') }}" class="btn btn-success">Add new User</a>
        <table class="table table-bordered table-striped mt-3">
            <thead>
            <tr>


                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Money Amount</th>
                <th>Is Admin</th>
                <th>Actions</th>
            </tr>
            </thead>

            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->first_name}}</td>
                    <td>{{$user->second_name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->phone_number}}</td>
                    <td>{{$user->money_amount}} UAH</td>
                    <td>{{$user->is_admin}}</td>
                    <td>
                        <a href="{{ route('user.edit', $user->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('user.destroy', $user->id) }}" method="post" style="display: inline;">
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
        {{ $users->links() }}
    </div>

@endsection

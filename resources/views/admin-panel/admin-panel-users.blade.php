@extends('layouts.app')

@section('content')
    <div class="container">
        @include('inc.admin-panel-buttons')
    </div>

    <div class="container">
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
                    <td>{{$user->money_amount}}</td>
                    <td>{{$user->is_admin}}</td>
                    <td>
                        <a href="http://young-tor-50341.herokuapp.com/employees/6/edit" class="btn btn-warning">Edit</a>
                        <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger">
                                delete
                        </button>
                    </td>
                </tr>
            @endforeach
            </tbody>


        </table>
    </div>

@endsection

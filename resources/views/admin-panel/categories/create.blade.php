@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Create user</h2>
    </div>
    @include('layouts.errors')
    <div class="container">
        <form action="{{ route('user.store') }}" method="post">
            @csrf
            <div>
                <div class="form-group">
                    <label>First Name</label>
                    <input type="text" class="form-control" name="first_name" placeholder="">
                </div>
                <div class="form-group">
                    <label>Last Name</label>
                    <input type="text" class="form-control" name="second_name" placeholder="">
                </div>
                <div class="form-group">
                    <label>E-mail</label>
                    <input type="email" class="form-control" name="email" placeholder="">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password" placeholder="">
                </div>
                <div class="form-group">
                    <label>Confirm Password</label>
                    <input type="password" class="form-control" name="password_confirmation" placeholder="">
                </div>
                <div class="form-group">
                    <label>Phone Number</label>
                    <input type="tel" class="form-control" name="phone_number" placeholder="">
                </div>
                <div class="form-group">
                    <label>Money Amount</label>
                    <input type="text" class="form-control" name="money_amount" placeholder="">
                </div>
                <div class="form-group">
                    <label>Is Admin</label>
                    <input type="checkbox" name="is_admin" placeholder="">
                </div>
            </div>
            <div>
                <button type="submit" class="btn btn-warning pull-right">Add</button>
            </div>
        </form>
    </div>
@endsection
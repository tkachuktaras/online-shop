@extends('layouts.app')

@section('content')
    <div class="container">
        <div>
            <div>
                <h3 class="box-title">Create user</h3>
                @include('layouts.errors')
            </div>
            <div>
                <div class="form-group">
                    <label>First Name</label>
                    <input type="text" class="form-control" name="first_name" placeholder="" value="{{old('first_name')}}">
                </div>
                <div class="form-group">
                    <label>Last Name</label>
                    <input type="text" class="form-control" name="last_name" placeholder="" value="{{old('last_name')}}">
                </div>
                <div class="form-group">
                    <label>E-mail</label>
                    <input type="text" class="form-control" name="email" placeholder="" value="{{old('email')}}">
                </div>
                <div class="form-group">
                    <label>Phone Number</label>
                    <input type="text" class="form-control" name="phone_number" placeholder="" value="{{old('phone_number')}}">
                </div>
                <div class="form-group">
                    <label>Money Amount</label>
                    <input type="text" class="form-control" name="money_amount" placeholder="" value="{{old('money_amount')}}">
                </div>
                <div class="form-group">
                    <label>Is Admin</label>
                    <input type="checkbox" name="is_admin" placeholder="" value="{{old('is_admin')}}">
                </div>
            </div>
            <div>
                <button class="btn btn-warning pull-right">Add</button>
            </div>
        </div>
    </div>
@endsection
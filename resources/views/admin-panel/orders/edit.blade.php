@extends('layouts.app')

@section('content')
    <div class="container">
        <section class="content">
            <div>
                <div>
                    <h3 class="box-title">Edit Employee</h3>
                    @include('layouts.errors')
                </div>
                <div>
                    <div class="form-group">
                        <label>First Name</label>
                        <input type="text" class="form-control" name="first_name" placeholder="" value="{{$user->first_name}}">
                    </div>
                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" class="form-control" name="last_name" placeholder="" value="{{$user->last_name}}">
                    </div>
                    <div class="form-group">
                        <label>Department Name</label>
                    </div>
                    <div class="form-group">
                        <label>E-mail</label>
                        <input type="text" class="form-control" name="email" placeholder="" value="{{$user->email}}">
                    </div>
                    <div class="form-group">
                        <label>Phone Number</label>
                        <input type="text" class="form-control" name="phone_number" placeholder="" value="{{$user->phone_number}}">
                    </div>
                    <div class="form-group">
                        <label>Money Amount</label>
                        <input type="text" class="form-control" name="money_amount" placeholder="" value="{{$user->money_amount}}">
                    </div>
                    <div class="form-group">
                        <label>Is Admin</label>
                        <input type="checkbox" name="is_admin" placeholder="" value="{{$user->is_admin}}">
                    </div>
                </div>
                <div>
                    <button class="btn btn-warning pull-right">Save</button>
                </div>
            </div>
        </section>
    </div>
@endsection
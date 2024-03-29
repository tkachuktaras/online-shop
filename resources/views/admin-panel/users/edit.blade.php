@extends('layouts.app-admin-panel')

@section('content')
    @section('h1-text')
        Edit user
    @endsection

    <form action="{{ route('user.update', ['id' => $user->id]) }}" method="POST">
        @csrf
        <div>
            @include('layouts.errors')
        </div>
        <div>
            <div class="form-group">
                <label>First Name</label>
                <input type="text" class="form-control" name="first_name" placeholder="" value="{{$user->first_name}}">
            </div>
            <div class="form-group">
                <label>Second Name</label>
                <input type="text" class="form-control" name="second_name" placeholder="" value="{{$user->second_name}}">
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
                <label>Is Admin</label>
                @if ($user->is_admin == 1)
                    <input type="checkbox" name="is_admin" placeholder="" checked>
                @else
                    <input type="checkbox" name="is_admin" placeholder="">
                @endif
            </div>
        </div>
        <div>
            <button type="submit" class="btn btn-warning pull-right">Save</button>
        </div>

    </form>
@endsection
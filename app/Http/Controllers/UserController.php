<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    public $timestamps = true;

    public function index()
    {
        $users = User::paginate(4);
        return view('admin-panel.users.index', ['users' => $users]);
    }

    public function create()
    {
        return view('admin-panel.users.create');
    }

    public function store(UserRequest $req){
        $user = new User();
        $user->first_name = $req->input('first_name');
        $user->second_name = $req->input('second_name');
        $user->email = $req->input('email');
        $user->password = bcrypt($req->input('password'));
        $user->phone_number = $req->input('phone_number');
        $user->money_amount = $req->input('money_amount');
        $user->is_admin = $req->input('is_admin');
        if(($req->input('is_admin')) == '') {
            $user->is_admin = false;
        } else {
            $user->is_admin = true;
        }

        $user->save();

        return redirect()->route('user.index');
    }

    public function edit($id){
        $user = new User();
        return view('admin-panel.users.edit', ['user' => $user->find($id)]);
    }

    public function update(Request $req, $id){
        $user = User::find($id);
        $user->first_name = $req->input('first_name');
        $user->second_name = $req->input('second_name');
        $user->email = $req->input('email');
        $user->phone_number = $req->input('phone_number');
        $user->money_amount = $req->input('money_amount');
        $user->is_admin = $req->input('is_admin');
        if(($req->input('is_admin')) == '') {
            $user->is_admin = false;
        } else {
            $user->is_admin = true;
        }

        $user->save();

        return redirect()->route('user.index');
    }

    public function destroy($id)
    {
        User::find($id)->delete();

        return redirect()->route('user.index');
    }
}

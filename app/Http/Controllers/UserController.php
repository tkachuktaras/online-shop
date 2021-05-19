<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function index()
    {
        if(Auth::user()->is_admin == 0){
            return redirect('/');
        }
        $users = User::paginate(3);
        return view('admin-panel.users.index', ['users' => $users]);
    }

    public function create()
    {
        if(Auth::user()->is_admin == 0){
            return redirect('/');
        }
        return view('admin-panel.users.create');
    }
}

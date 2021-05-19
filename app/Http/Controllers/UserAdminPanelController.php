<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserAdminPanel;

class UserAdminPanelController extends Controller
{
    public function index()
    {
        $users = UserAdminPanel::all();
        return view('admin-panel.admin-panel-users', ['users' => $users]);
    }
}

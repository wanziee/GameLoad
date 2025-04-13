<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    public function showUsers(){

        $allUsers = User::all();
        return view('admin.adminUsers',compact('allUsers'));
    }
}

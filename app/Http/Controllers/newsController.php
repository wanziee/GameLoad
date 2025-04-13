<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class newsController extends Controller
{
    public function showNews()
    {
        return view('user.news');
    }
}

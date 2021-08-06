<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index() {
       return view('admin.dashboard');
    }

    public function foods() {
       return view('admin.foods');
    }
}

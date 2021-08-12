<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    //
    public function index()
    {
        return view('multistepform');
    }

    public function formSubmit(Request $req)
    {
        return $req->all();
    }
}

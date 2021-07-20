<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showFormLogin()
    {
        if (Auth::check()) {
            return redirect()->route('admin.dashboard');
        }
        return view('admin.login');
    }
  
    public function login(Request $request)
    {
  
        $data = [
            'email'     => $request->input('email'),
            'password'  => $request->input('password'),
        ];
  
        Auth::attempt($data);
  
        if (Auth::check()) { 
            return redirect()->route('admin.dashboard');
  
        } else { 
            Session::flash('error', 'Email atau password salah');
            return redirect()->route('admin.login');
        }
  
    }

    public function logout(Request $request)
    {
        $request->session()->invalidate();
        return redirect()->route('admin.login');
    }
}

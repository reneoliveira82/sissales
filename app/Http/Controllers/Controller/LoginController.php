<?php

namespace App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function info()
    {
        Auth::logout();
        return view('auth.info');
    }

    public function inactive()
    {
        Auth::logout();
        return view('auth.inactive');
    }

    // public function entrar()
    // {
    //     return redirect('/home');
    // }
}

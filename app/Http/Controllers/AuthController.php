<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
       // dd($request);
    $credentials = $request->only('email','password');
    //dd($credentials);
    if (auth()->attempt($credentials)) {
        $request->session()->regenerate();

        return redirect()->intended('dashboard');
    }
    return back()->withErrors([
        'email' => 'The provided credentials do not match our records.',
    ]);
    }
    public function showRegister()
    {
    return view('auth.register');
    }

    public function register(RegisterRequest $request){
    dd($request);
    }



}


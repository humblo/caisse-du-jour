<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class SigninController extends Controller
{
    //
    public function index()
    {
        if (auth()->check()) {
            return redirect('/dashboard');
        }
        return view('auth.login');
    }

    public function login(Request $request)
    {
        /**
         * 1. Validator
         */
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');
        /**
         * 2. Redirection
         */
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard')
                ->withSuccess('Signed in');
        }
        return redirect("/")->withSuccess('Login incorrecte');
    }

    public function logout()
    {
        /**
         * 1. Suppression session et déconnexion
         * 2. Rédirection à la page login
         */
        Session::flush();
        Auth::logout();
        return Redirect('/');
    }
}

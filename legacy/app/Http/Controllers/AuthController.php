<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function index()
    {
        return view('admin.v_login', [
            'title' => 'Login'
        ]);
    }

    public function credentials(Request $Request)
    {
        $credentials = $Request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard.user');
        } else {
            return redirect()->back()->with([
                'error' => 'Salah email atau password'
            ]);
            // Do Something when failed login
        }
    }

    public function logout()
    {
        Auth::logout();
        session()->flush();
        return redirect()->route('login');
    }
}

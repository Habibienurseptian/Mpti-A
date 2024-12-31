<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Supzport\Facades\Hash;


class AuthController extends Controller
{
    public function register(){
        return view('auth.register');
    }

    public function store(){
        $validated = request()->validate([
            'name' => 'required|min:3|max:40',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:8'
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' =>($validated['password'])
        ]);

        return redirect()->route('dashboard')->with('success', 'Account Created Succesfully');

    }

    public function login(){
        return view('auth.login');
    }

    public function authenticate(){


        $validated = request()->validate([
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);


        if (Auth::attempt($validated)){

            request()->session()->regenerate();

            return redirect()->route('dashboard');
        }

        return redirect()->route('login')->withErrors([
            'email' => "User not found"
        ]);

    }

    public function logout(){
        Auth::logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('dashboard');
    }
}

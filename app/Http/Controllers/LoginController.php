<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index() {
        return view('login');
    }

    public function login(Request $request) {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        // Authentication
        if (Auth::attempt($request->only('username', 'password'))) {
            $user = Auth::user();

            // Redirect to dashboard with the user name
            return redirect()->route('dashboard');
        } else {
            // Authentication failed, redirect back with errors
            return redirect()->route('login')->withErrors(['error' => 'Invalid email or password']);
        }

    }

}


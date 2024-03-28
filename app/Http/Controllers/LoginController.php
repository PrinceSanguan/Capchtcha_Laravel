<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index() {
        // Check if the user is already authenticated
        if (auth()->check()) {
            // User is already logged in, redirect to the dashboard or another page
            return redirect()->route('dashboard');
        }

        // User is not logged in, show the login form
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
    
        // Authentication
        if (Auth::attempt($request->only('username', 'password'))) {
            $user = Auth::user();
    
            // Check user status
            if ($user->status == 1) {
                // Check user type
                if ($user->type == 'player') {
                    // Redirect player to their dashboard
                    return redirect()->route('dashboard');
                    
                }  elseif ($user->type == 'programmer') {
                    // Redirect programmer to their dashboard
                    return redirect()->route('programmer.dashboard');
                }
            } else {
                // User is not activated, inform the user and log them out
                Auth::logout();
                return redirect()->route('auth.login')->with(['error' => 'Your account is not yet activated. Please wait for activation by your agent.']);
            }
        } else {
            // Authentication failed, redirect back with errors
            return redirect()->route('auth.login')->with(['error' => 'Invalid email or password']);
        }
    }
}

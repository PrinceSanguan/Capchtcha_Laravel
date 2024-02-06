<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\URL;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;

class ProgrammerController extends Controller
{
    private function getUserInfo()
    {
        // Get the currently authenticated user
        $authenticatedUser = Auth::user();

        // Check if the authenticated user exists
        if (!$authenticatedUser) {
            return null;
        }

        // Fetch user information based on the authenticated user's username
        return User::where('username', $authenticatedUser->username)->first();
    }

    public function index()
    {
        $users = $this->getUserInfo();

        // Check if the user is found
        if (!$users) {
            return redirect()->route('login')->withErrors(['error' => 'User not found.']);
        }

        // Check if the user type is 'programmer'
        if ($users->type !== 'programmer') {
            // Redirect to the same page with an error message
            return redirect()->route('login')->withErrors(['error' => 'Access denied.']);
        }

        // Pass the information to the view
        return view('programmer.dashboard', ['users' => $users]);
    }

    public function ActivePlayer()
    {
        $users = $this->getUserInfo();

        // Check if the user is found
        if (!$users) {
            return redirect()->route('login')->withErrors(['error' => 'User not found.']);
        }

        // Check if the user type is 'programmer'
        if ($users->type !== 'programmer') {
            // Redirect to the same page with an error message
            return redirect()->route('login')->withErrors(['error' => 'Access denied.']);
        }

        // Pass the information to the view
        return view('programmer.active_player', ['users' => $users]);
    }
}

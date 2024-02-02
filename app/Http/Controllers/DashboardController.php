<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Session;


class DashboardController extends Controller
{
    public function index() {
    // Get the currently authenticated user
    $authenticatedUser = auth()->user();

    // Check if the authenticated user exists
    if (!$authenticatedUser) {
        return redirect()->route('login')->withErrors(['error' => 'User not found.']);
    }

    // Fetch user information based on the authenticated user's username
    $users = User::where('name', $authenticatedUser->name)->first();

    // Check if the user is found
    if (!$users) {
        return redirect()->route('login')->withErrors(['error' => 'User not found.']);
    }

    // Pass the information to the view
    return view('dashboard', ['users' => $users]);
    }

    public function logout() {

        Session::flush();
        Auth::logout();

        return redirect()->route('login');
    }
}

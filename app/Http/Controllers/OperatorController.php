<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;

class OperatorController extends Controller
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
        if ($users->type !== 'operator') {
            // Redirect to the same page with an error message
            return redirect()->route('login')->withErrors(['error' => 'Access denied.']);
        }

        // Get the total number of players
        $totalPlayers = User::where('type', 'player')->count();

        // Get the total number of agents
        $totalAgents = User::where('type', 'agent')->count();

        // Get the current user's points
        $currentPoints = $users->point;

        // Pass the information to the view
        return view('operator.dashboard', compact('users', 'totalPlayers', 'totalAgents', 'currentPoints'));

    }
}
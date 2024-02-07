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

    public function Player()
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

        // Fetch all jobs from the database
        $data = User::where('type', 'player')->get();

        // Pass the information to the view
        return view('programmer.player', ['users' => $users, 'data' => $data]);
    }

    public function AllAccount()
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

        // Fetch all in database
        $data = User::all();

        // Pass the information to the view
        return view('programmer.all_account', ['users' => $users, 'data' => $data]);
    }

    public function Agent()
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

        // Fetch all jobs from the database
        $data = User::where('type', 'agent')->get();

        // Pass the information to the view
        return view('programmer.agent', ['users' => $users, 'data' => $data]);
    }

    public function Operator()
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

        // Fetch all jobs from the database
        $data = User::where('type', 'operator')->get();

        // Pass the information to the view
        return view('programmer.agent', ['users' => $users, 'data' => $data]);
    }

    //////////////////////////// Deleting Player only on Programmer Exist ///////////////////////////////////////
    public function DeleteAccount($id)
    {
        // Find the user by ID
        $user = User::find($id);

        // Delete the user
        $user->delete();

        // Redirect back with success message (optional)
        return redirect()->back()->with('success', 'Account deleted successfully');
    }
    //////////////////////////// Deleting Player only on Programmer Exist ///////////////////////////////////////
}

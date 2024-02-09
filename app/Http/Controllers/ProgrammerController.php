<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;


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

            // Get the total number of accounts
        $totalAccounts = User::count();

        // Get the total number of players
        $totalPlayers = User::where('type', 'player')->count();

        // Get the total number of agents
        $totalAgents = User::where('type', 'agent')->count();

        // Get the total number of operators
        $totalOperators = User::where('type', 'operator')->count();

        // Get the total number of points
        $totalPoints = User::sum('point');

        // Pass the information to the view
        return view('programmer.dashboard', compact('users', 'totalAccounts', 'totalPlayers', 'totalAgents', 'totalOperators', 'totalPoints'));

        //return view('programmer.dashboard', ['users' => $users]);
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
        return view('programmer.operator', ['users' => $users, 'data' => $data]);
    }

    public function Wallet()
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
        return view('programmer.wallet', ['users' => $users, 'data' => $data]);
    }

    public function SendPoint(Request $request, $id) {
        // Find the user by ID
        $user = User::findOrFail($id);
    
        $request->validate([
            'point' => 'required|numeric|integer|min:0',
        ]);
    
        // Get the points from the request
        $newPoints = $request->input('point');
    
        // Update the user's points
        $user->update([
            'point' => $user->point + $newPoints,
        ]);
    
        // You can add a success message or redirect the user to a specific page
        return redirect()->back()->with('success', 'Points successfully updated!');
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
    public function updateUserStatus($id)
    {
        // Find the user by ID
        $user = User::findOrFail($id);
    
        // Toggle the status (1 to 0 or 0 to 1)
        $user->status = $user->status == '1' ? '0' : '1';
    
        // Handle user type update logic based on the button clicked
    $request = request();
    if ($request->has('type')) {
        $newType = $request->input('type');

        // Ensure the newType is a valid user type
        if (in_array($newType, ['player', 'agent', 'operator', 'programmer'])) {
            $user->type = $newType;
        }
    }
    
        $user->save();
    
        // Redirect back with success message
        return redirect()->back()->with('success', 'User status updated successfully');
    }  

}

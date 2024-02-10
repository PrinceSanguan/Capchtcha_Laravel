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

    public function AllAccount()
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

        // Fetch all agents referred by the operator
        $referredAgents = User::where('type', 'agent')->where('referral_id', $users->id)->get();

        // Fetch all players referred by the agents, including those referred by agents referred by the operator
        $data = User::where(function ($query) use ($users, $referredAgents) {
            $query->whereIn('referral_id', $referredAgents->pluck('id'))
                ->orWhere('referral_id', $users->id);
        })
        ->orWhere(function ($query) use ($users) {
            $query->where('type', 'agent')
                ->where('referral_id', $users->id);
        })
        ->where('type', 'player')
        ->get();

        // Pass the information to the view
        return view('operator.all_account', ['users' => $users, 'data' => $data]);
    }

    public function Player()
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

        // Fetch all agents referred by the operator
        $agents = User::where('type', 'agent')->where('referral_id', $users->id)->get();

        // Fetch all players referred by the agents and directly by the operator
        $data = User::where(function ($query) use ($users, $agents) {
                     $query->whereIn('referral_id', $agents->pluck('id'))
                           ->orWhere('referral_id', $users->id);
                 })
                 ->where('type', 'player')
                 ->get();

        // Pass the information to the view
        return view('operator.player', ['users' => $users, 'data' => $data]);
    }

    public function Agent()
    {
        $users = $this->getUserInfo();

        // Check if the user is found
        if (!$users) {
            return redirect()->route('login')->withErrors(['error' => 'User not found.']);
        }

        // Check if the user type is 'operator'
        if ($users->type !== 'operator') {
            // Redirect to the same page with an error message
            return redirect()->route('login')->withErrors(['error' => 'Access denied.']);
        }

        // Fetch all agents referred by the operator
        $data = User::where('type', 'agent')->where('referral_id', $users->id)->get();

        // Pass the information to the view
        return view('operator.agent', ['users' => $users, 'data' => $data]);
    }

    public function Wallet()
    {
        $users = $this->getUserInfo();

        // Check if the user is found
        if (!$users) {
            return redirect()->route('login')->withErrors(['error' => 'User not found.']);
        }

        // Check if the user type is 'operator'
        if ($users->type !== 'operator') {
            // Redirect to the same page with an error message
            return redirect()->route('login')->withErrors(['error' => 'Access denied.']);
        }

        // Fetch only agents that were referred by the current operator
        $data = User::where('type', 'agent')->where('referral_id', $users->id)->get();

        // Get the total number of points for the current user
        $userPoints = $users->point;

        // Pass the information to the view
        return view('operator.wallet', ['users' => $users, 'data' => $data, 'userPoints' => $userPoints]);
    }

    public function SendPoint(Request $request, $id) {
        // Find the user by ID
        $sender = auth()->user();
        $user = User::findOrFail($id);
    
        $request->validate([
            'point' => 'required|numeric|integer|min:0',
        ]);
    
       // Get the points from the request
        $pointsToSend = $request->input('point');

        // Check if the sender has sufficient points
        if ($sender->point < $pointsToSend) {
        return redirect()->back()->with('error', 'You do not have sufficient points. Please contact the programmer.');
        }

         // Deduct points from the sender and update points for the receiver
        $sender->update([
            'point' => $sender->point - $pointsToSend,
        ]);
    
        // Update the user's points
        $user->update([
            'point' => $user->point + $pointsToSend,
        ]);
    
        // You can add a success message or redirect the user to a specific page
        return redirect()->back()->with('success', 'Points successfully updated!');
    }

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
        if (in_array($newType, ['player', 'agent'])) {
            $user->type = $newType;
        }
    }
        $user->save();
    
        // Redirect back with success message
        return redirect()->back()->with('success', 'User status updated successfully');
    }
}
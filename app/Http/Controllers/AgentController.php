<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AgentController extends Controller
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
            return redirect()->route('auth.login')->withErrors(['error' => 'User not found.']);
        }

        // Check if the user type is 'Agent'
        if ($users->type !== 'agent') {
            // Redirect to the same page with an error message
            return redirect()->route('auth.login')->withErrors(['error' => 'Access denied.']);
        }

        // Get the total number of players
        $totalPlayers = User::where('type', 'player')->where('referral_id', $users->id)->count();

        // Define the conversion rate
        $pointsToMakeRatio = 3;
    
        // Calculate the Total earnings of the agent
        $currentEarnings = round($users->point / $pointsToMakeRatio, 2);

        // Build the referral link
        $referralLink = 'http://captcha.free.nf/auth/signin?ref=' . $users->id;

        // Pass the information to the view
        return view('agent.dashboard', compact('users', 'totalPlayers', 'currentEarnings', 'referralLink'));
    }

    public function PendingAccount()
    {
        $users = $this->getUserInfo();

        // Check if the user is found
        if (!$users) {
            return redirect()->route('auth.login')->withErrors(['error' => 'User not found.']);
        }

        // Check if the user type is 'agent'
        if ($users->type !== 'agent') {
            // Redirect to the same page with an error message
            return redirect()->route('auth.login')->withErrors(['error' => 'Access denied.']);
        }

        // Fetch all operator referred by the programmer
        $data = User::whereNull('type')->where('referral_id', $users->id)->get();

        // Pass the information to the view
        return view('agent.pending_account', ['users' => $users, 'data' => $data]);
    }

    public function updateUserStatus(Request $request, $id)
    {

        $user = $this->getUserInfo();

        // Find the user by ID
        $user = User::findOrFail($id);
    
        // Toggle the status (1 to 0 or 0 to 1)
        $user->status = $user->status == '1' ? '0' : '1';
    
        // Set the user type to 'Player' when the Agent activates the account or when the user status becomes 1
        if ($request->has('active') || $user->status == '1') {
            $user->type = 'player';
        }

        $user->save();
    
        // Redirect back with success message
        return redirect()->back()->with('success', 'User status updated successfully');
    }

    public function Player()
    {
        $users = $this->getUserInfo();

        // Check if the user is found
        if (!$users) {
            return redirect()->route('auth.login')->withErrors(['error' => 'User not found.']);
        }

        // Check if the user type is 'programmer'
        if ($users->type !== 'agent') {
            // Redirect to the same page with an error message
            return redirect()->route('auth.login')->withErrors(['error' => 'Access denied.']);
        }

        // Fetch all Players from the database
        $data = User::where('type', 'player')->get();

        // Pass the information to the view
        return view('agent.player', ['users' => $users, 'data' => $data]);
    }
}

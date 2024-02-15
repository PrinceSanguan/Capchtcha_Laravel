<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;

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
            return redirect()->route('auth.login')->withErrors(['error' => 'User not found.']);
        }

        // Check if the user type is 'Operator'
        if ($users->type !== 'operator') {
            // Redirect to the same page with an error message
            return redirect()->route('auth.login')->withErrors(['error' => 'Access denied.']);
        }

        // Get the total number of players
        $totalPlayers = User::where('type', 'player')->where('referral_id', $users->id)->count();

        // Get the total number of agents
        $totalAgents = User::where('type', 'agent')->where('referral_id', $users->id)->count();

        // Get the total number of pending account
        $pendingAccount = User::whereNull('type')->where('referral_id', $users->id)->count();

        // Calculate the Total earnings of the operator
        $currentEarnings = $users->point;

        // Build the referral link
        $referralLink = 'http://captcha.free.nf/auth/signin?ref=' . $users->id;

        // Pass the information to the view
        return view('operator.dashboard', compact('users', 'totalPlayers', 'totalAgents', 'currentEarnings', 'referralLink', 'pendingAccount'));
    }

    public function PendingAccount()
    {
        $users = $this->getUserInfo();

        // Check if the user is found
        if (!$users) {
            return redirect()->route('auth.login')->withErrors(['error' => 'User not found.']);
        }

        // Check if the user type is 'Operator'
        if ($users->type !== 'operator') {
            // Redirect to the same page with an error message
            return redirect()->route('auth.login')->withErrors(['error' => 'Access denied.']);
        }

        // Fetch all agents referred by the operator
        $data = User::whereNull('type')->where('referral_id', $users->id)->get();

        // Pass the information to the view
        return view('operator.pending_account', ['users' => $users, 'data' => $data]);
    }

    public function Player()
    {
        $users = $this->getUserInfo();

        // Check if the user is found
        if (!$users) {
            return redirect()->route('auth.login')->withErrors(['error' => 'User not found.']);
        }

        // Check if the user type is 'programmer'
        if ($users->type !== 'operator') {
            // Redirect to the same page with an error message
            return redirect()->route('auth.login')->withErrors(['error' => 'Access denied.']);
        }

         // Fetch all agents referred by the operator
        $agents = User::where('type', 'agent')->where('referral_id', $users->id)->get();

        // Fetch all players directly referred by agents referred by the operator
        $data = User::whereIn('referral_id', $agents->pluck('id'))
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
            return redirect()->route('auth.login')->withErrors(['error' => 'User not found.']);
        }

        // Check if the user type is 'operator'
        if ($users->type !== 'operator') {
            // Redirect to the same page with an error message
            return redirect()->route('auth.login')->withErrors(['error' => 'Access denied.']);
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
            return redirect()->route('auth.login')->withErrors(['error' => 'User not found.']);
        }

        // Check if the user type is 'operator'
        if ($users->type !== 'operator') {
            // Redirect to the same page with an error message
            return redirect()->route('auth.login')->withErrors(['error' => 'Access denied.']);
        }

        // Fetch only agents that were referred by the current operator
        $data = User::where('type', 'agent')->where('referral_id', $users->id)->get();

        // Get the total number of points for the current user
        $userPoints = $users->point;

        // Pass the information to the view
        return view('operator.wallet', ['users' => $users, 'data' => $data, 'userPoints' => $userPoints]);
    }

    public function Link()
    {
        $users = $this->getUserInfo();

        // Check if the user is found
        if (!$users) {
            return redirect()->route('auth.login')->withErrors(['error' => 'User not found.']);
        }

        // Check if the user type is 'Operator'
        if ($users->type !== 'operator') {
            // Redirect to the same page with an error message
            return redirect()->route('auth.login')->withErrors(['error' => 'Access denied.']);
        }

        // Pass the information to the view
        return view('operator.link', ['users' => $users]);
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


    public function updateUserStatus(Request $request, $id)
    {

        $user = $this->getUserInfo();
        
        // Find the user by ID
        $user = User::findOrFail($id);
    
        // Toggle the status (1 to 0 or 0 to 1)
        $user->status = $user->status == '1' ? '0' : '1';
    
        // Set the user type to 'agent' when the operator activates the account or when the user status becomes 1
        if ($request->has('active') || $user->status == '1') {
            $user->type = 'agent';
        }
    
        $user->save();
    
        // Redirect back with success message
        return redirect()->back()->with('success', 'User status updated successfully');
    }

    public function topup()
    {
        $users = $this->getUserInfo();

        // Check if the user is found
        if (!$users) {
            return redirect()->route('auth.login')->withErrors(['error' => 'User not found.']);
        }

        // Check if the user's type is "operator"
        if ($users->type !== 'operator') {
            // Redirect to the previous page or any specific page you want
            return redirect()->back()->withErrors(['error' => 'Access denied.']);
        }

        // Pass the information to the view
        return view('operator.topup', ['users' => $users]);
    }

    public function changePassword() {
        
        $users = $this->getUserInfo();

        // Check if the user is found
        if (!$users) {
            return redirect()->route('auth.login')->withErrors(['error' => 'User not found.']);
        }

        // Check if the user's type is "operator"
        if ($users->type !== 'operator') {
            // Redirect to the previous page or any specific page you want
            return redirect()->back()->withErrors(['error' => 'Access denied.']);
        }

        // Pass the information to the view
        return view('operator.change_password', ['users' => $users]);
    }

    public function changePasswordRequest(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => [
                'required',
                'regex:/^(?=.*[a-zA-Z])(?=.*\d).{6,}$/',
            ],
            'confirm_password' => 'required|same:new_password',
        ]);
    
        $user = auth()->user();
    
        if (!Hash::check($request->current_password, $user->password)) {
            throw ValidationException::withMessages(['current_password' => 'Incorrect current password']);
        }
    
        $user->update(['password' => Hash::make($request->new_password)]);
    
        return redirect()->route('operator.change.password')->with('success', 'Password changed successfully');
    }

}
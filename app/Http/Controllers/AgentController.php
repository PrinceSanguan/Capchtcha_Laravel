<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Carbon\Carbon;

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

    
        // Calculate the Total earnings of the agent
        $currentEarnings = $users->point;

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

    public function Wallet()
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

        // Fetch only players that were referred by the current agent
        $data = User::where('type', 'player')->where('referral_id', $users->id)->get();

        // Get the total number of points for the current user
        $userPoints = $users->point;

        // Pass the information to the view
        return view('agent.wallet', ['users' => $users, 'data' => $data, 'userPoints' => $userPoints]);
    }

    public function withdraw()
    {
        $users = $this->getUserInfo();

        // Check if the user is found
        if (!$users) {
            return redirect()->route('auth.login')->withErrors(['error' => 'User not found.']);
        }

        // Check if the user's type is "agent"
        if ($users->type !== 'agent') {
            // Redirect to the previous page or any specific page you want
            return redirect()->back()->withErrors(['error' => 'Access denied.']);
        }

        $totalPoints = $users->point;

        // Pass the information to the view
        return view('agent.withdraw', ['users' => $users, 'totalPoints' => $totalPoints]);
    }

    public function withdrawPoints(Request $request) 
    {
    // Get the user information
    $user = $this->getUserInfo();

    // Check if the user is found
    if (!$user) {
        return redirect()->route('auth.login')->withErrors(['error' => 'User not found.']);
    }

    // Check if the user type is 'agent'
    if ($user->type !== 'agent') {
        // Redirect to the same page with an error message
        return redirect()->route('auth.login')->withErrors(['error' => 'Access denied.']);
    }

    $request->validate([
        'point' => 'required|numeric|integer|',
    ]);

    // Get the points from the request
    $withdrawalAmount = $request->input('point');

    // Check if the withdrawal ammount is equal to 50
    if ($withdrawalAmount < 50) {
        return redirect()->back()->with('error', 'The minimum withdrawal amount is 50 points. Make a valid withdrawal.');
    }

    // Check if the deduction would result in a negative value
    if ($user->point - $withdrawalAmount < 0) {
        return redirect()->back()->with('error', 'The withdrawal amount exceeds your current points. Make a valid withdrawal.');
    }

    // Deduct points from the agent
    $user->update([
        'point' => $user->point - $withdrawalAmount,
    ]);

    // Check if there's a referral and update the operator's points
    if ($user->referral_id) {
        $operator = User::where('type', 'operator')->where('id', $user->referral_id)->first();

        // Check if the operator is found
        if ($operator) {
            
            // Get the name of the operator
            $operatorName = $operator->name;
            $formattedDate = Carbon::now()->format('F j, Y g:ia');

            $operator->update([
                'point' => $operator->point + $withdrawalAmount,
            ]);
        }
    }
    // Redirect with success message
    return redirect()->route('agent.success')->with('success', "Success! You withdrew {$withdrawalAmount} 
    points. Screen shot this and submit it to your operator {$operatorName} on {$formattedDate}. Thank you!");

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
        return redirect()->back()->with('error', 'You do not have sufficient points. Please contact the Operator.');
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

    public function success()
    {
        $users = $this->getUserInfo();

        // Check if the user is found
        if (!$users) {
            return redirect()->route('auth.login')->withErrors(['error' => 'User not found.']);
        }

        // Pass the information to the view
        return view('agent.success', ['users' => $users]);
    }

    public function topup()
    {
        $users = $this->getUserInfo();

        // Check if the user is found
        if (!$users) {
            return redirect()->route('auth.login')->withErrors(['error' => 'User not found.']);
        }

        // Check if the user's type is "AGENT"
        if ($users->type !== 'agent') {
            // Redirect to the previous page or any specific page you want
            return redirect()->back()->withErrors(['error' => 'Access denied.']);
        }

        // Pass the information to the view
        return view('agent.topup', ['users' => $users]);
    }
}

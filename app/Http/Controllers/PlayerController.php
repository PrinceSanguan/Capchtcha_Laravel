<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\URL;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;


class PlayerController extends Controller
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

        // Check if the user's type is "player"
        if ($users->type !== 'player') {
            // Redirect to the previous page or any specific page you want
            return redirect()->back()->withErrors(['error' => 'Access denied.']);
        }

        $totalPoints = $users->point;

        // Pass the information to the view
        return view('player.dashboard', ['users' => $users, 'totalPoints' => $totalPoints]);
    }

    public function topup()
    {
        $users = $this->getUserInfo();

        // Check if the user is found
        if (!$users) {
            return redirect()->route('auth.login')->withErrors(['error' => 'User not found.']);
        }

        // Check if the user's type is "player"
        if ($users->type !== 'player') {
            // Redirect to the previous page or any specific page you want
            return redirect()->back()->withErrors(['error' => 'Access denied.']);
        }

        // Pass the information to the view
        return view('player.topup', ['users' => $users]);
    }

    public function withdraw()
    {
        $users = $this->getUserInfo();

        // Check if the user is found
        if (!$users) {
            return redirect()->route('auth.login')->withErrors(['error' => 'User not found.']);
        }

        // Check if the user's type is "player"
        if ($users->type !== 'player') {
            // Redirect to the previous page or any specific page you want
            return redirect()->back()->withErrors(['error' => 'Access denied.']);
        }

        $totalPoints = $users->point;

        // Pass the information to the view
        return view('player.withdraw', ['users' => $users, 'totalPoints' => $totalPoints]);
    }

    public function withdrawPoints(Request $request) 
    {
    // Get the user information
    $user = $this->getUserInfo();

    // Check if the user is found
    if (!$user) {
        return redirect()->route('auth.login')->withErrors(['error' => 'User not found.']);
    }

    // Check if the user type is 'player'
    if ($user->type !== 'player') {
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

    // Deduct points from the player
    $user->update([
        'point' => $user->point - $withdrawalAmount,
    ]);

    // Check if there's a referral and update the agent's points
    if ($user->referral_id) {
        $agent = User::where('type', 'agent')->where('id', $user->referral_id)->first();

        // Check if the agent is found
        if ($agent) {
            
            // Get the name of the agent
            $agentName = $agent->name;
            $formattedDate = Carbon::now()->format('F j, Y g:ia');

            $agent->update([
                'point' => $agent->point + $withdrawalAmount,
            ]);
        }
    }
    // Redirect with success message
    return redirect()->route('success')->with('success', "Success! You withdrew {$withdrawalAmount} 
    points. Screen shot this and submit it to your agent {$agentName} on {$formattedDate}. Thank you!");

}

    public function solveCaptcha()
    {
        $users = $this->getUserInfo();

        // Check if the user is found
        if (!$users) {
            return redirect()->route('auth.login')->withErrors(['error' => 'User not found.']);
        }

        // Check if the user's type is "player"
        if ($users->type !== 'player') {
            // Redirect to the previous page or any specific page you want
            return redirect()->back()->withErrors(['error' => 'Access denied.']);
        }

        // Pass the information to the view
        return view('player.solve_captcha', ['users' => $users]);
    }

    public function error()
    {
        $users = $this->getUserInfo();

        // Check if the user is found
        if (!$users) {
            return redirect()->route('auth.login')->withErrors(['error' => 'User not found.']);
        }

        // Pass the information to the view
        return view('player.error', ['users' => $users]);
    }

    public function success()
    {
        $users = $this->getUserInfo();

        // Check if the user is found
        if (!$users) {
            return redirect()->route('auth.login')->withErrors(['error' => 'User not found.']);
        }

        // Pass the information to the view
        return view('player.success', ['users' => $users]);
    }

    public function changePassword() {
        
        $users = $this->getUserInfo();

        // Check if the user is found
        if (!$users) {
            return redirect()->route('auth.login')->withErrors(['error' => 'User not found.']);
        }

        // Check if the user's type is "player"
        if ($users->type !== 'player') {
            // Redirect to the previous page or any specific page you want
            return redirect()->back()->withErrors(['error' => 'Access denied.']);
        }

        // Pass the information to the view
        return view('player.change_password', ['users' => $users]);
    }

    public function updateUserPoints(Request $request)
    {
        $lastAttemptTime = Session::get('last_captcha_attempt', 0);
    
        // Check if the user is trying to bypass the waiting period
        if (time() - $lastAttemptTime < 20) {
            $error = "Please wait 20 seconds before attempting another Captcha.";
            return redirect()->route('error')->with('error', $error);
        }
    
        $validator = Validator::make($request->all(), [
            'captcha' => 'required|captcha',
        ]);
    
        // Assuming you have a user authenticated
        $user = auth()->user();
    
        // Check if points are 0 or negative
        if ($user->point <= 0) {
            $error = "Your points are insufficient. Please contact your agent to top up your points.";
            return redirect()->route('error')->with('error', $error);
        }
    
        if ($validator->fails()) {
            // Deduct 3 points for an invalid Captcha
            $user->point = max(0, $user->point - 3.00); // Ensure points don't go below zero
            $user->save();
    
            $error = "You have entered an invalid Captcha. 3.00 Pesos have been deducted.";
            Session::put('last_captcha_attempt', time()); // Update last attempt time
            return redirect()->route('error')->with('error', $error);
        }
    
        // Update user points for a correct Captcha
        $user->point += 1.00;
        $user->save();
    
        $success = "You have entered the correct Captcha. You earned 1.00 Peso.";
        Session::put('last_captcha_attempt', time()); // Update last attempt time
    
        // Add a 20 seconds countdown before redirecting back to the dashboard
        Session::put('countdown', 20);
        Session::put('redirect_url', URL::route('solve.captcha'));
    
        return redirect()->route('success')->with('success', $success);
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
    
        return redirect()->route('change.password')->with('success', 'Password changed successfully');
    }
    
    public function logout() {

        Session::flush();
        Auth::logout();

        return redirect()->route('welcome');
    }
}

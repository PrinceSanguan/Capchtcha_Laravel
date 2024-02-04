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


class DashboardController extends Controller
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
        return User::where('name', $authenticatedUser->name)->first();
    }

    public function index()
    {
        $users = $this->getUserInfo();

        // Check if the user is found
        if (!$users) {
            return redirect()->route('login')->withErrors(['error' => 'User not found.']);
        }

        // Pass the information to the view
        return view('dashboard', ['users' => $users]);
    }

    public function earnings()
    {
        // Assuming you have a user authenticated
        $users = auth()->user();
    
        // Check if the user is found
        if (!$users) {
            return redirect()->route('login')->withErrors(['error' => 'User not found.']);
        }
    
        // Define the conversion rate
        $pointsToMakeRatio = 3;
    
        // Calculate the "make" value based on the user's points
        $makeValue = round($users->point / $pointsToMakeRatio, 2);
    
        // Pass the information to the view
        return view('earnings', ['users' => $users, 'makeValue' => $makeValue]);
    }

    public function topup()
    {
        $users = $this->getUserInfo();

        // Check if the user is found
        if (!$users) {
            return redirect()->route('login')->withErrors(['error' => 'User not found.']);
        }

        // Pass the information to the view
        return view('topup', ['users' => $users]);
    }

    public function withdraw()
    {
        $users = $this->getUserInfo();

        // Check if the user is found
        if (!$users) {
            return redirect()->route('login')->withErrors(['error' => 'User not found.']);
        }

        // Pass the information to the view
        return view('withdraw', ['users' => $users]);
    }

    public function solveCaptcha()
    {
        $users = $this->getUserInfo();

        // Check if the user is found
        if (!$users) {
            return redirect()->route('login')->withErrors(['error' => 'User not found.']);
        }

        // Pass the information to the view
        return view('solve_captcha', ['users' => $users]);
    }

    public function error()
    {
        $users = $this->getUserInfo();

        // Check if the user is found
        if (!$users) {
            return redirect()->route('login')->withErrors(['error' => 'User not found.']);
        }

        // Pass the information to the view
        return view('error', ['users' => $users]);
    }

    public function success()
    {
        $users = $this->getUserInfo();

        // Check if the user is found
        if (!$users) {
            return redirect()->route('login')->withErrors(['error' => 'User not found.']);
        }

        // Pass the information to the view
        return view('success', ['users' => $users]);
    }

    public function changePassword() {
        
        $users = $this->getUserInfo();

        // Check if the user is found
        if (!$users) {
            return redirect()->route('login')->withErrors(['error' => 'User not found.']);
        }

        // Pass the information to the view
        return view('change_password', ['users' => $users]);
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
    
        if ($validator->fails()) {
            // Assuming you have a user authenticated
            $user = auth()->user();

        // Check if points are 0 or negative
        if ($user->point <= 0) {
            $error = "Your points are insufficient. Please contact your agent to top up your points.";
            return redirect()->route('error')->with('error', $error);
        }
    
        // Deduct 3 points for an invalid Captcha
        $user->point = max(0, $user->point - 3.00); // Ensure points don't go below zero
        $user->save();
    
            $error = "You have entered an invalid Captcha. 3 points have been deducted.";
            Session::put('last_captcha_attempt', time()); // Update last attempt time
            return redirect()->route('error')->with('error', $error);
        }
    
        // Assuming you have a user authenticated
        $user = auth()->user();
    
        // Update user points for a correct Captcha
        $user->point += 1.00;
        $user->save();
    
        // Check if points are 0 or negative
        if ($user->point <= 0) {
            $error = "Your points are insufficient. Please contact yourt agent to top up your points.";
            return redirect()->route('error')->with('error', $error);
        }
    
        $success = "You have entered the correct Captcha. You earned 1 point.";
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

        return redirect()->route('login');
    }
}

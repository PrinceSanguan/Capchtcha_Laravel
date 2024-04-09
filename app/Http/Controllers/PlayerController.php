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
use App\Models\Transaction;


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

    // Check if the withdrawal ammount is equal to 15
    if ($withdrawalAmount < 15) {
        return redirect()->back()->with('error', 'The minimum withdrawal amount is 15 pesos. Make a valid withdrawal.');
    }

    // Check if the deduction would result in a negative value
    if ($user->point - $withdrawalAmount < 0) {
        return redirect()->back()->with('error', 'The withdrawal amount exceeds your current points. Make a valid withdrawal.');
    }

    // Deduct points from the player
    $user->update([
        'point' => $user->point - $withdrawalAmount,
    ]);

     $formattedDate = Carbon::now()->format('F j, Y g:ia');

    // Create a transaction record
    Transaction::create([
        'user_id' => $user->id,
        'amount' => $withdrawalAmount,
        'type' => 'withdrawal',
    ]);

    // Redirect with success message
    return redirect()->route('transactions')->with('success', "Success! You withdrew {$withdrawalAmount} 
    Pesos on {$formattedDate}. Thank you!");
}

public function UpdatePromo1(Request $request) 
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
        'promo1' => 'required',
    ]);

    // Save in database
    $user->promo1 = $request->promo1;
    $user->save();

    // Create a transaction record
    Transaction::create([
        'user_id' => $user->id,
        'amount' => 10,
        'type' => 'deposit',
    ]);
    

    // Redirect with success message
    return redirect()->route('promo')->with('success', "Success! your request is pending make sure your gcash have a balance");
}

 public function UpdatePromo2(Request $request) 
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
        'promo2' => 'required',
    ]);

    // Save in database
    $user->promo2 = $request->promo2;
    $user->save();

    // Create a transaction record
    Transaction::create([
        'user_id' => $user->id,
        'amount' => 50,
        'type' => 'deposit',
    ]);

    // Redirect with success message
    return redirect()->route('promo')->with('success', "Success! your request is pending make sure your gcash have a balance");
}

public function UpdatePromo3(Request $request) 
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
    'promo3' => 'required',
]);

// Save in database
$user->promo3 = $request->promo3;
$user->save();

// Create a transaction record
Transaction::create([
    'user_id' => $user->id,
    'amount' => 200,
    'type' => 'deposit',
]);


// Redirect with success message
return redirect()->route('promo')->with('success', "Success! your request is pending make sure your gcash have a balance");
}

public function UpdatePromo4(Request $request) 
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
    'promo4' => 'required',
]);

// Save in database
$user->promo4 = $request->promo4;
$user->save();

// Create a transaction record
Transaction::create([
    'user_id' => $user->id,
    'amount' => 500,
    'type' => 'deposit',
]);

// Redirect with success message
return redirect()->route('promo')->with('success', "Success! your request is pending make sure your gcash have a balance");
}

public function UpdatePromo5(Request $request) 
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
    'promo5' => 'required',
]);

// Save in database
$user->promo5 = $request->promo5;
$user->save();

// Create a transaction record
Transaction::create([
    'user_id' => $user->id,
    'amount' => 1000,
    'type' => 'deposit',
]);

// Redirect with success message
return redirect()->route('promo')->with('success', "Success! your request is pending make sure your gcash have a balance");
}

public function UpdatePromo6(Request $request) 
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
    'promo6' => 'required',
]);

// Save in database
$user->promo6 = $request->promo6;
$user->save();

// Create a transaction record
Transaction::create([
    'user_id' => $user->id,
    'amount' => 5000,
    'type' => 'deposit',
]);

// Redirect with success message
return redirect()->route('promo')->with('success', "Success! your request is pending make sure your gcash have a balance");
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

public function SolveMath()
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
    return view('player.solve_math', ['users' => $users]);
}

public function transactions()
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

    // Fetch all User transactions from the database
    $transaction = Transaction::where('user_id', $users->id)->get();

    // Pass the information to the view
    return view('player.transactions', ['users' => $users, 'transaction' => $transaction]);
}

public function Promo()
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
    return view('player.promo', ['users' => $users]);
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
        $remainingTrials = auth()->user()->trial;
    
        // Check if the user is trying to bypass the waiting period
        if (time() - $lastAttemptTime < 20) {
            $error = "Please wait 20 seconds before attempting another Captcha.";
            return redirect()->route('error')->with('error', $error);
        }
    
        $validator = Validator::make($request->all(), [
            'captcha' => 'required|captcha',
        ]);

        // Check if the user has remaining trials
        if ($remainingTrials <= 0) {
            $error = "You have exhausted your captcha trials. Please buy in order to earn money.";
            return redirect()->route('error')->with('error', $error);
        }
    
        // Assuming you have a user authenticated
        $user = auth()->user();
    
        if ($validator->fails()) {
            /* // Deduct 1 points for an invalid Captcha and decrement the remaining trial
            $user->trial = max(0, $user->trial - 1);
            $user->save(); */
    
            $error = "You have entered an invalid Captcha";
            Session::put('last_captcha_attempt', time()); // Update last attempt time
            return redirect()->route('error')->with('error', $error);
        }
    
        // Update user points for a correct Captcha and decrement the remaining trial
        $user->point += 1.00;
        $user->trial = max(0, $user->trial - 1);
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

    public function topupSuccess()
    {
        // You can customize the success message as per your requirement
        $successMessage = "We will verify your top-up, please wait for 20 to 30 minutes. Thank you.";

        return redirect()->route('success')->with('success', $successMessage);
    }
    
    public function logout() {

        Session::flush();
        Auth::logout();

        return redirect()->route('welcome');
    }
}

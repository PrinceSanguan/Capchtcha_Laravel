<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Transaction;


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
            return redirect()->route('auth.login')->withErrors(['error' => 'User not found.']);
        }

        // Check if the user type is 'programmer'
        if ($users->type !== 'programmer') {
            // Redirect to the same page with an error message
            return redirect()->route('auth.login')->withErrors(['error' => 'Access denied.']);
        }

        // Get the total number of pending account
        $pendingAccounts = User::whereNull('type')->where('referral_id', $users->id)->count();

        // Get the total number of pending accounts
        $totalPlayerAccounts = User::where('type', 'player')->where('referral_id', $users->id)->count();

        // Get the total number of points
        $totalPoints = User::sum('point');

        // Build the referral link
        $referralLink = 'www.captcha.free.nf/auth/signin?ref=' . $users->id;

        // Pass the information to the view
        return view('programmer.dashboard', compact('users', 'pendingAccounts', 'totalPlayerAccounts', 'totalPoints', 'referralLink'));
    }

    public function Player()
    {
        $users = $this->getUserInfo();

        // Check if the user is found
        if (!$users) {
            return redirect()->route('auth.login')->withErrors(['error' => 'User not found.']);
        }

        // Check if the user type is 'programmer'
        if ($users->type !== 'programmer') {
            // Redirect to the same page with an error message
            return redirect()->route('auth.login')->withErrors(['error' => 'Access denied.']);
        }

        // Fetch all Players from the database
        $data = User::where('type', 'player')->get();

        // Pass the information to the view
        return view('programmer.player', ['users' => $users, 'data' => $data]);
    }

    public function Level()
    {
        $users = $this->getUserInfo();

        // Check if the user is found
        if (!$users) {
            return redirect()->route('auth.login')->withErrors(['error' => 'User not found.']);
        }

        // Check if the user type is 'programmer'
        if ($users->type !== 'programmer') {
            // Redirect to the same page with an error message
            return redirect()->route('auth.login')->withErrors(['error' => 'Access denied.']);
        }

        // Fetch all Players from the database
        $data = User::where('type', 'player')->get();

        // Pass the information to the view
        return view('programmer.level', ['users' => $users, 'data' => $data]);
    }

    public function PendingAccount()
    {
        $users = $this->getUserInfo();

        // Check if the user is found
        if (!$users) {
            return redirect()->route('auth.login')->withErrors(['error' => 'User not found.']);
        }

        // Check if the user type is 'programmer'
        if ($users->type !== 'programmer') {
            // Redirect to the same page with an error message
            return redirect()->route('auth.login')->withErrors(['error' => 'Access denied.']);
        }

        // Fetch all new accounts without a referral ID and type is null
        $data = User::whereNull('type')->whereNull('referral_id')->get();

        // Pass the information to the view
        return view('programmer.pending_account', ['users' => $users, 'data' => $data]);
    }

    public function Wallet()
    {
        $users = $this->getUserInfo();

        // Check if the user is found
        if (!$users) {
            return redirect()->route('auth.login')->withErrors(['error' => 'User not found.']);
        }

        // Check if the user type is 'programmer'
        if ($users->type !== 'programmer') {
            // Redirect to the same page with an error message
            return redirect()->route('auth.login')->withErrors(['error' => 'Access denied.']);
        }

        // Fetch all player from the database
        $data = User::where('type', 'player')->get();

        // Pass the information to the view
        return view('programmer.wallet', ['users' => $users, 'data' => $data]);
    }

    public function Transaction()
    {
        $users = $this->getUserInfo();

        // Check if the user is found
        if (!$users) {
            return redirect()->route('auth.login')->withErrors(['error' => 'User not found.']);
        }

        // Check if the user type is 'programmer'
        if ($users->type !== 'programmer') {
            // Redirect to the same page with an error message
            return redirect()->route('auth.login')->withErrors(['error' => 'Access denied.']);
        }

        // Fetch all player transaction from the database
        $data = Transaction::all();

        // Pass the information to the view
        return view('programmer.transaction', ['users' => $users, 'data' => $data]);
    }

    public function TransactionStatus(Request $request, $id)
    {
        // Find the User by ID
        $user = Transaction::findOrFail($id);
    
        $request->validate([
            'status' => 'required',
        ]);

        // Get the Status type from the request
        $requestedStatus = $request->input('status');

         // Update the Transaction Status
        $user->status = $requestedStatus;
        $user->update();

        // Redirect back or to a specific page after updating the level
        return redirect()->back()->with('success', 'Transaction is Updated');

    }

    public function SendTrial(Request $request, $id) {

        // Find the user by ID
        $users = User::findOrFail($id);
    
        $request->validate([
            'trialLevel' => 'required|numeric|integer|min:0',
        ]);
    
        // Get the trialLevel from the request
        $trialLevel = $request->input('trialLevel');
    
        // Define trial levels and their corresponding trial values
        $trialLevels = [
            1 => 10,
            2 => 70,
            3 => 270,
            4 => 650,
            5 => 3500,
            6 => 10000,
        ];

            // Update the user's trial based on the input value
        if (isset($trialLevels[$trialLevel])) {
            $users->trial = $trialLevels[$trialLevel];
            $users->trialLevel = $trialLevel;

            // Activate corresponding promo based on trial level
            switch ($trialLevel) {
                case 1:
                    $users->promo1 = 'activate';
                    break;
                case 2:
                    $users->promo2 = 'activate';
                    break;
                case 3:
                    $users->promo3 = 'activate';
                    break;
                case 4:
                    $users->promo4 = 'activate';
                    break;
                case 5:
                    $users->promo5 = 'activate';
                    break;
                case 6:
                    $users->promo6 = 'activate';
                    break;
                default:
                    break;
            }
        } else {
            return redirect()->back()->with('error', 'Invalid trial input.');
        }

        $users->save();

        // You can add a success message or redirect the user to a specific page
        return redirect()->back()->with('success', 'Trials successfully updated!');
    }

    public function UpdateLevel(Request $request, $id)
    {
        // Find the user by ID
        $user = User::findOrFail($id);
    
        $request->validate([
            'level' => 'required',
        ]);

        // Get the Level type from the request
        $requestedLevel = $request->input('level');

         // Update the user's level
        $user->level = $requestedLevel;
        $user->save();

        // Redirect back or to a specific page after updating the level
        return redirect()->back()->with('success', 'User Level is updated');

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
    public function updateUserStatus(Request $request, $id)
    {

        $user = $this->getUserInfo();

        // Find the user by ID
        $user = User::findOrFail($id);
    
        // Toggle the status (1 to 0 or 0 to 1)
        $user->status = $user->status == '1' ? '0' : '1';
    
        // Set the user type to 'Player' when the Programmer activates the account or when the user status becomes 1
        if ($request->has('active') || $user->status == '1') {
            $user->type = 'player';
        }

        $user->save();
    
        // Redirect back with success message
        return redirect()->back()->with('success', 'User status updated successfully');
    }  

}

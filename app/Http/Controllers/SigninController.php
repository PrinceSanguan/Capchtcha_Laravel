<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class SigninController extends Controller
{
    public function index() {
        return view('signin');
    }

    public function signinForm(Request $request) {

        // Validate the request data with custom error messages
        $request->validate([
            'name' => 'required|alpha_space',
            'username' => 'required|unique:users',
            'password' => [
                'required',
                'confirmed',
                'regex:/^(?=.*[a-zA-Z])(?=.*\d).{6,}$/',
            ],
            'number' => 'required|numeric|digits:11',
        ], [
            'password.regex' => 'The password must contain at least one letter, one number, and be at least 6 characters long.',
        ]);

        // Saving in the database
        $user = User::create([
            'name' => $request->input('name'),
            'username' => $request->input('username'),
            'number' => $request->input('number'),
            'password' => bcrypt($request->input('password')),
        ]);
        
        if (!$user) {
            return redirect()->route('register');
        }

        // Redirect with success message
        return redirect()->route('login')->with('success', 'You have successfully signed in! Wait for the Approval of the agent to activate your account.');
    }

}

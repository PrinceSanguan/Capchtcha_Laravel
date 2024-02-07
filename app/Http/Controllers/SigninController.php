<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class SigninController extends Controller
{
    public function index() {
        // Check if the user is already authenticated
        if (auth()->check()) {
            // User is already logged in, redirect to the dashboard or another page
            return redirect()->route('dashboard');
        }
        
        return view('signin');
    }

    public function signinForm(Request $request) {

        // Validate the request data with custom error messages
        $request->validate([
            'username' => 'required|unique:users',
            'name' => 'required|alpha_space',
            'email' => 'required|email',
            'work' => 'required',
            'address' => 'required',
            'gender' => 'required',
            'password' => [
                'required',
                'confirmed',
                'regex:/^(?=.*[a-zA-Z])(?=.*\d).{6,}$/',
            ],
            'number' => 'required|numeric|digits:11',
            'file' => 'required|image'
        ], [
            'password.regex' => 'The password must contain at least one letter, one number, and be at least 6 characters long.',
        ]);

        // Check if a file is uploaded
        if ($request->hasFile('file')) {
            // Store the file and get the path
            $path = $request->file('file')->store('/', ['disk' => 'my_disk']);
        } else {
            // Handle the case where no file is uploaded
            return redirect()->route('register')->with('error', 'Please upload a profile image.');
        }

        // Saving in the database
        $user = User::create([
            'username' => $request->input('username'),
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'work' => $request->input('work'),
            'address' => $request->input('address'),
            'gender' => $request->input('gender'),
            'number' => $request->input('number'),
            'password' => bcrypt($request->input('password')),
            'image' => $path,
            'point' => 0,
            'status' => '0',
            'type' => 'player',
        ]);

        if (!$user) {
            return redirect()->route('register')->with('error', 'Failed to create user.');
        }

        // Redirect with success message
        return redirect()->route('login')->with('success', 'You have successfully signed in! Wait for the Approval of the agent to activate your account.');
    }

}

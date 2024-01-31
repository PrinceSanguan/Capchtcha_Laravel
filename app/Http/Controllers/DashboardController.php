<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class DashboardController extends Controller
{
    public function index() {
        return view('dashboard');
    }

    public function logout() {

        Session::flush();
        Auth::logout();

        return redirect()->route('login');
    }
}

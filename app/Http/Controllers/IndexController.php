<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class IndexController extends Controller
{
   public function index() {
    return view('welcome');
   }

   public function about() {
      return view('about');
   }

   public function services() {
      return view('services');
   }

   public function whyUs() {
      return view('why_us');
   }

   public function practice() {
      return view('practice');
   }

   public function practiceSolve(Request $request)
   {
       // Retrieve the current totalIncome from the cookie or initialize it to 0.00
       $totalIncome = $request->cookie('totalIncome', 0.00);
   
       // Validate the form data, including the captcha field
       $validator = Validator::make($request->all(), [
           'captcha' => 'required|captcha',
       ]);
   
       // Check if the validation fails
       if ($validator->fails()) {
           return redirect()->back()->withErrors($validator)->withInput()->with('error', 'The captcha is incorrect. Please try again.');
       }
   
       // Captcha validation passed, update income
       $updatedIncome = 1.00;
   
       // Add $updatedIncome to the total income variable
       $totalIncome += $updatedIncome;
   
       // Store the updated totalIncome in the cookie
       $response = redirect()->back()->with('success', 'You earned ' . number_format($updatedIncome, 2) . ' Peso!')->with('totalIncome', $totalIncome);
       $response->cookie('totalIncome', $totalIncome, 2); // Cookie expires in 2 minutes
   
       return $response;
   }
}

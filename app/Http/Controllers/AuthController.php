<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
     // Show the registration form
     public function registrationform()
     {
         return view('admin.register');
     }
 
     // Handle registration
     public function register(Request $request)
     {
         $validator = Validator::make($request->all(), [
             'first_name' => 'required|string|max:255',
             'last_name' => 'required|string|max:255',
             'username' => 'required|string|unique:users|max:255',
             'email' => 'required|string|email|unique:users|max:255',
             'password' => 'required|string|min:8|confirmed',
         ]);
 
        //  if ($validator->fails()) {
        //      return redirect()->back()->withErrors($validator)->withInput();
        //  }
 
         User::create([
             'first_name' => $request->first_name,
             'last_name' => $request->last_name,
             'username' => $request->username,
             'email' => $request->email,
             'password' => Hash::make($request->password),
         ]);
 
         return redirect()->route('admin.login')->with('success', 'Registration successful. Please login.');
     }
    
     public function loginform()
     {
         return view('admin.login'); // Adjust the view path as necessary
     }
 
     public function login(Request $request)
     {
         // Validate incoming request
         $credentials = $request->validate([
             'username' => 'required|string|exists:users,username',
             'password' => 'required|string',

         ]);
         Log::warning('Login failed', ['username' => $request->input('username')]);
         if (Auth::attempt($credentials)) 
         $request->session()->regenerate();{
        Log::info('User logged in successfully', ['user_id' => Auth::id()]);
            
         return redirect('admin/users');
         }}
        
        }

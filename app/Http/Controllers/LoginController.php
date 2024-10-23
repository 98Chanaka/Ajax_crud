<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Login;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        return view('login');
    }
    public function login(Request $request)
    {
        error_log("================================================================================login function");

        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $user = Login::where('username', $request->username)->first();

        if ($user) {
            error_log("User found");
        } else {
            error_log("User not found");
        }

        if ($user && Hash::check($request->password, $user->password)) {
            error_log("Password match");
            Auth::login($user);

            return view('Home');
        } else {
            error_log("Password is incorrect");
            return redirect()->back()->withErrors(['login_error' => 'Invalid username or password.']);
        }
    }




    public function logout()
    {
        Auth::logout();
        return redirect()->route('/login')->with('success', 'Logged out successfully.');
    }



}

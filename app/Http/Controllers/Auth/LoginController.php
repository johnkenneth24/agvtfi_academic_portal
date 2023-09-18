<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function login()
    {
      return view('auth.login');
    }

    public function verifyUser(Request $request)
    {
        $credentials = $request->validate([
            'school_id' => 'required', // array of rules error
            'password' => 'required',
        ]);

        // login using credentials and return to intended route which is the dashboard
        if (Auth::attempt($credentials)) {
            session()->regenerate();
            return redirect()->intended('dashboard')->with(['success' => 'You are logged in.']);
        } else {
            return back()->withErrors(['school_id' => 'This credential does not match our records.']);
        }

    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}

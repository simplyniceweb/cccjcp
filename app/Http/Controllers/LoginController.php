<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function authenticate(Request $request)
    {
        $credentials = request()->validate([
            'userid' => ['required'],
            'user_pass' => ['required'],
        ]);

        $user = User::where('userid', $credentials['userid'])
                ->where('user_pass', md5($credentials['user_pass']))
                ->first();

        if (!$user) {
            throw ValidationException::withMessages([
                'userid' => 'The provided credentials do not match our records.'
            ]);
        }

        Auth::login($user);
 
        $request->session()->regenerate();

        return redirect('/')->with('message', 'Welcome, ' . Auth::user()->userid . '!');
    }

    public function username()
    {
        return 'userid';
    }

    public function logout(Request $request)
    {
        Auth::logout();
     
        $request->session()->invalidate();
        $request->session()->regenerateToken();
     
        return redirect('/')->with('message', 'Goodbye!');
    }
}

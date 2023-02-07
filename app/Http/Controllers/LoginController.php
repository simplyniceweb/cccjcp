<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function authenticate(Request $request)
    {
        request()->validate([
            'userid' => ['required'], // , 'unique:login,userid'
            'password' => ['required'],
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
     
        $request->session()->invalidate();
        $request->session()->regenerateToken();
     
        return redirect('/')->with('message', 'Goodbye!');
    }
}

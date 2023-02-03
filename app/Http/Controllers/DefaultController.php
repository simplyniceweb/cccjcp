<?php

namespace App\Http\Controllers;

use App\Models\Char;
use App\Models\User;
use Illuminate\Http\Request;

class DefaultController extends Controller
{
    public function index()
    {
        $users = User::where('id', '!=', 1);
        $online = Char::where('online', 1)->count();

        return view('home', [
            'users' => $users,
            'count' => $online
        ]);
    }
}

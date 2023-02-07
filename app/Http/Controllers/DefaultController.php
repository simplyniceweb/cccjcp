<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\MobDb;
use App\Models\ItemDb;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DefaultController extends Controller
{
    public function index()
    {
        // dd(Auth::user());
        $results = [];
        $type = request()->input('type');
        $search = request()->input('search');

        if ($type && $search) {
            if ($type == 'item') {
                $results = ItemDb::where('name_english', 'LIKE', '%'.$search.'%')->paginate();
            } else {
                $results = MobDb::where('kName', 'LIKE', '%'.$search.'%')->paginate();
            }

            $results = $results->appends(request()->input());
        }

        $users = User::where('id', '!=', 1);

        return view('home', [
            'users' => $users,
            'results' => $results,
            'type' => $type
        ]);
    }
}

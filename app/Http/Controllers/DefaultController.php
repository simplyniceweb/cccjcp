<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\ItemDb;
use Illuminate\Http\Request;

class DefaultController extends Controller
{
    public function index()
    {
        $results = [];
        $type = request()->input('type');
        $search = request()->input('search');

        if ($type && $search) {
            if ($type == 'item') {
                $results = ItemDb::where('name_english', 'LIKE', '%'.$search.'%')->paginate();
                $results = $results->appends(request()->input());
            } else {
                $results = ItemDb::where('kName', 'LIKE', '%'.$search.'%')->paginate();
                $results = $results->appends(request()->input());
            }
        }

        $users = User::where('id', '!=', 1);

        return view('home', [
            'users' => $users,
            'results' => $results
        ]);
    }
}

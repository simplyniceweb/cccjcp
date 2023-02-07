<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CharacterController extends Controller
{
    public function resetPosition(?int $char_id)
    {
        User::where('char_id', $char_id)
        ->update([
            'last_map' => 'prontera',
            'last_x' => '155',
            'last_y' => '180',
        ]);

        return redirect('/');
    }
}

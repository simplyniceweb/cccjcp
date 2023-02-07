<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CharacterController extends Controller
{
    public function resetPosition(?int $char_id)
    {
        $character = DB::table('char')->where('char_id', $char_id)->first();

        $character->last_map = 'prontera';
        $character->last_x = '155';
        $character->last_y = '180';
        $character->save();

        return redirect('/');
    }
}

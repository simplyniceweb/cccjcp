<?php

namespace App\Http\Controllers;

use App\Models\Char;
use App\Models\Inventory;
use Illuminate\Support\Facades\DB;

class CharacterController extends Controller
{
    public function resetPosition(?int $char_id)
    {
        Char::where('char_id', $char_id)
        ->update([
            'last_map' => 'prontera',
            'last_x' => '155',
            'last_y' => '180',
        ]);

        return redirect('/')->with('message', 'Character position reset successfully.');
    }

    public function resetLook(?int $char_id)
    {
        Inventory::where('char_id', $char_id)->update(['equip' => 0]);

        Char::where('char_id', $char_id)->update([
            'hair' => 0,
            'hair_color' => 0,
            'clothes_color' => 0,
            'weapon' => 0,
            'shield' => 0,
            'head_top' => 0,
            'head_mid' => 0,
            'head_bottom' => 0,
        ]);

        return redirect('/')->with('message', 'Character look reset successfully.');
    }
}

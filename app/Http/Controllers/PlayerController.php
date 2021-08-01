<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Person_info;


class PlayerController extends Controller
{
    //
    public function player(){
        $players = User::select('name','icon')->get();
        return view('player',[
            "players" => $players
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use App\Models\User;
use App\Models\PersonInfo;


class PlayerController extends Controller
{
    //
    public function player(){
        $players = User::select('name','icon','id')->with('PersonInfo')->get();
        //$players = PersonInfo::select('part')->get();
        //dd($players, $players->first(), $players->first()->PersonInfo);
        return view('player',[
            "players" => $players
        ]);
    }
}
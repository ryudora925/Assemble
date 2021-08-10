<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Search;
use App\Models\User;

class SearchController extends Controller
{
    //絞り込み
    public function search(Request $request){
        $players = User::select('name','icon','id')->with('PersonInfo')->get();
        $sql = User::select('name','icon','id')->with('PersonInfo');
        $sql->where('area','==',$request->area);
        $players = $sql->get();
        //dd($players, $players->first(), $players->first()->PersonInfo);
        return view('player',[
            "players" => $players
        ]);



    }
}

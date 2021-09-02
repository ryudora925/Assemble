<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use App\Models\User;
use App\Models\PersonInfo;
use App\Models\BandInfo;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;


class PlayerController extends Controller
{
    //
    public function player(Request $request){
        //ログインユーザidを取得
        $userid = Auth::id();
        $band_user = Auth::user()->band_flag;

        if($band_user === 0){
            $players = User::select('name','icon','id')->with('PersonInfo')->get();
            $sql = User::where('id','!=',$userid)->select('name','icon','id','band_flag')->with('PersonInfo');
        }else{
            $players = User::select('name','icon','id','band_flag')->with('PersonInfo')->get();
            $sql = User::where('id','!=',$userid)->where('band_flag','!=',1)->select('name','icon','id','band_flag')->with('PersonInfo');
        }

        //エリア絞り込み
        if(isset($request->area) && strlen($request->area) > 0){
            $sql->whereHas('PersonInfo', function (Builder $query) use ($request) {
                $query->where('area','=',$request->area);
            });
        }

        //パート絞り込み
        if(isset($request->part) && strlen($request->part) > 0){
            $sql->whereHas('PersonInfo', function (Builder $query) use ($request) {
                $query->where('part','=',$request->part);
            });
        }

        //楽器経歴
        if(isset($request->year) && strlen($request->year) > 0){
            $sql->whereHas('PersonInfo', function (Builder $query) use ($request) {
                $query->where('year','=',$request->year);
            });
        }

        //性別絞り込み
        if(isset($request->gender) && strlen($request->gender) > 0){
            $sql->whereHas('PersonInfo', function (Builder $query) use ($request) {
                $query->where('gender','=',$request->gender);
            });
        }

        //募集しているパート絞り込み
        if(isset($request->want_part) && strlen($request->want_part) > 0){
            $sql->whereHas('BandInfo', function (Builder $query) use ($request) {
                $query->where('want_part','=',$request->want_part);
            });
        }

        //バンドの活動地域絞り込み
        if(isset($request->area) && strlen($request->area) > 0){
            $sql->whereHas('BandInfo', function (Builder $query) use ($request) {
                $query->where('area','=',$request->area);
            });
        }

        $players = $sql->paginate(9);

        //dd($players, $players->first(), $players->first()->PersonInfo);
        return view('player',[
            "players" => $players,
        ]);
    }
}
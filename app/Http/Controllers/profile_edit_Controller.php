<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\profile_edit;
use App\Models\band_edit;
use App\Models\User;

class profile_edit_Controller extends Controller
{
    /**
     * 個人プロフィール編集
     *
     * @param Request $request
     * @return Response
     */
    
    
    
    public function index(Request $request)
    { 
        // ログインしているユーザー情報を渡す
        $user = \Auth::user();
        // ユーザー情報一覧を取得
        if($user->band_flag == 1){
            $band_info = band_edit::where('user_id' , $user['id']) -> first();
            return view('/profile-band_edit' ,  compact('user', 'band_info'));
        }else{
            $person_info = profile_edit::where('user_id' , $user['id']) -> first();
            return view('/profile_edit' , compact('user', 'person_info' ));
        }
    }

    public function profile_edit_store(Request $request)
    {
        $posts = $request->all();
        $name = $request->name;
        if($request->icon){
            $path = $request->icon->store('usericon','public');
            Auth::user()->icon = $path;
        }
        

        // データの確認をするデバッグ関数
        // dd(\Auth::id());
        
        //アイコンの登録、名前の変更
        Auth::user()->name = $name;
        Auth::user()->save();

        //POSTされた値をデータベースへ挿入
        $profile_edit = profile_edit::updateOrCreate(
            ['user_id' => \Auth::id()],
            ['part' => $posts['part'],
            'year' => $posts['year'],
            'area' => $posts['area'],
            'gender' => $posts['gender'],
            'song' => $posts['song'],
            'category' => $posts['category'],
            'introduction' => $posts['introduction']
            ]
        );
            return redirect('profile');
    }



public function band_edit_store(Request $request)
    {
        $posts = $request->all();
        $name = $request->name;
        if($request->icon){
            $path = $request->icon->store('usericon','public');
        }else{
            $path = null;
        }

        // データの確認をするデバッグ関数
        // dd(\Auth::id());

        //アイコンの登録、名前の変更
        Auth::user()->name = $name;
        Auth::user()->icon = $path;
        Auth::user()->save();

        //POSTされた値をデータベースへ挿入
        $band_edit = band_edit::updateOrCreate(
            ['user_id' => \Auth::id()],
            ['area' => $posts['area'],
            'band_part' => $posts['band_part'],
            'want_part' => $posts['want_part'],
            'category' => $posts['category'],
            'style' => $posts['style'],
            'introduction' => $posts['introduction']
            ]
            
        );
            return redirect('profile-band');
    }
}
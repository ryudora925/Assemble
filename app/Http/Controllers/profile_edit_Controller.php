<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use App\Models\Utilities;
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
        //validation
        $validate = $request->validate([
            'icon' => ['mimes:jpeg,png,jpg,gif', 'max:10240'],
            'name' => ['required', 'max:64'],
            'introduction' => ['required', 'max:500'],
            'part' => [Rule::in(array_keys(\App\Models\Utilities::PART))],
            'year' => [Rule::in(array_keys(\App\Models\Utilities::YEAR))],
            'area' => [Rule::in(array_keys(\App\Models\Utilities::AREA))],
            'gender' => [Rule::in(array_keys(\App\Models\Utilities::GENDER))],
            'song' => ['required', 'max:64'],
            'category' => [Rule::in(array_keys(\App\Models\Utilities::CATEGORY))]
        ]);

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
        //validation
        $validate = $request->validate([
            'icon' => ['mimes:jpeg,png,jpg,gif', 'max:10240'],
            'name' => ['required', 'max:64'],
            'introduction' => ['required', 'max:500'],
            'want_part' => [Rule::in(array_keys(\App\Models\Utilities::PART))],
            'area' => [Rule::in(array_keys(\App\Models\Utilities::AREA))],
            'band_part' => ['max:64'],
            'category' => [Rule::in(array_keys(\App\Models\Utilities::CATEGORY))],
            'style' => [Rule::in(array_keys(\App\Models\Utilities::STYLE))]
        ]);

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
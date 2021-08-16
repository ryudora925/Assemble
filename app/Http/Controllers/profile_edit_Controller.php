<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\profile_edit;

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
        $person_info = profile_edit::where('user_id' , $user['id']) -> first();
        return view('/profile_edit' , compact('user', 'person_info' ));
    }

    public function profile_edit_store(Request $request)
    {
        $posts = $request->all();
        // データの確認をするデバッグ関数
        // dd(\Auth::id());

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
}

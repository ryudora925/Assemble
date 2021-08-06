<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{asset('css/style.css')}}">
        <title>プロフィール編集画面</title>
        <meta name="description" content="プロフィール編集画面">
    </head>

    <body>
        <h1>Assemble</h1>

        <div class="main">
            <!--サイドメニュー-->
            <div class="side">
                <ul class="nav">
                    <!--マイページ-->
                    <div class="list">
                        <li class="nav-item">
                            <a href="#">マイページ</a>
                        </li>
                    </div>
                    <!--一覧-->
                    <div class="list">
                        <li class="nav-item">
                            <a href="">一覧</a>
                        </li>
                    </div>
                    <!--絞り込み-->
                    <div class="list">
                        <li class="nav-item">
                            <a href="">絞り込み</a>
                        </li>
                    </div>
                    <!--やりとり中-->
                    <div class="list">
                        <li class="nav-item">
                            <a href="">やり取り中</a>
                        </li>
                    </div>
                </ul>
            </div>
            <!--メイン-->
            <div class="profile-area">
                
                <!--プロフィール画像-->
                <div class="profile-icon">
                    <img src="images/1.webp" alt="">
                </div>
                <!--名前、自己紹介文-->
                <div class="myself">
                    <p class="name">名前: Matsuhashi Saneto</p>
                    <p class="intro">岐阜県の岐阜市に住んでいます。</p>
                    <!--パート、経歴、居住地、性別、やりたいジャンル-->
                    <div class="details">
                        <form method="POST" action="{{ route('profile_edit_store') }}" >
                        @csrf
                        @php
                        $parts = [
                            1 => 'アコースティックギター',    
                            2 => 'エレキギター',    
                            3 => 'ベース',    
                            4 => 'ドラム',    
                            5 => 'キーボード',    
                            6 => 'ボーカル',    
                            7 => 'DJ',    
                        ];
                        @endphp
                        <p>パート:
                            <select name="part" size="1">
                                @foreach($parts as $key => $part)
                                    <option value="{{$key}}" @if($key == 7)selected @endif>{{$part}}</option>
                                @endforeach
                            </select>
                        </p>
                        <p>楽器経歴:
                            <select name="year" size="1">
                                <option value="1">～半年</option>
                                <option value="2">半年～1年</option>
                                <option value="3">1~3年</option>
                                <option value="4">3~5年</option>
                                <option value="5">5年～</option>
                            </select>
                        </p>
                        <!-- 47都道府県 -->
                        <p>居住地:
                            <input type="radio" name="area" value="1">北海道
                            <input type="radio" name="area" value="2">東北
                            <input type="radio" name="area" value="3">関東
                            <input type="radio" name="area" value="4">中部
                            <input type="radio" name="area" value="5">近畿
                            <input type="radio" name="area" value="6">中国
                            <input type="radio" name="area" value="7">四国
                            <input type="radio" name="area" value="8">九州
                        </p>
                        <p>性別:
                            <input type="radio" name="gender" value="1">男性
                            <input type="radio" name="gender" value="2">女性
                        </p>
                        <p>好きな曲:
                            <input type="text" name="song">
                        </p>
                        <p>やりたいジャンル:
                            <input type="radio" name="category" value="1">POPS
                            <input type="radio" name="category" value="2">邦Rock
                            <input type="radio" name="category" value="">洋Rock
                            <input type="radio" name="category" value="">Jazz
                            <input type="radio" name="category" value="">アニソン
                        </p>
                    </div>
                    <button type="submit">登録する</button></a>
                </div>
            </div>
        </div>
    </body>
</html>
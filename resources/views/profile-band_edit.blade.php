<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{asset('css/style.css')}}">
        <!--javascript 画像プレビュー-->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script language="JavaScript">
            $(function(){
                $("[name='icon']").on('change', function (e) {

                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $("#MyIcon").attr('src', e.target.result);
                    }

                    reader.readAsDataURL(e.target.files[0]);   

                });
            });
        </script>
        <title>プロフィール画面</title>
        <meta name="description" content="プロフィール画面">
    </head>

    <body><!--バンドでログイン-->
        <header class="title">
            <h1>Assemble</h1>
            <p>マイページ</p>
        </header>
        <div class="main">
            <!--サイドメニュー-->
            <div class="side">
                <ul class="nav">
                    <!--マイページ-->
                    <div class="list">
                        <li class="nav-item">
                            <a href="/profile-band">マイページ</a>
                        </li>
                    </div>
                    <!--一覧-->
                    <div class="list">
                        <li class="nav-item">
                            <a href="/player">一覧</a>
                        </li>
                    </div>
                    <!--絞り込み-->
                    <div class="list">
                        <li class="nav-item">
                            <a href="/search">絞り込み</a>
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
                    @if($user->icon)
                    <img src="{{ asset('storage/'.$user->icon) }}" alt="" name="MyIcon" id="MyIcon">
                    @else
                    <img src="{{ asset('storage/user/default.jpeg') }}" alt="" id="MyIcon">
                    @endif
                    <form method="POST" action="{{ route('profile_edit_store') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="icon" id="icon">
                </div>
                <!--名前、自己紹介文-->
                <div class="myself">
                    <p class="name">バンド名: {{$user['name']}}</p>
                    <form method="POST" action="{{ route('profile-band_edit_store') }}" >
                        @csrf
                        <textarea class="intro-edit" name='introduction'>{{$band_info['introduction']}}</textarea>
                        
                    <!--パート、経歴、居住地、性別、やりたいジャンル-->
                    <div class="details">
                    <p>募集しているパート: 
                        <select name="want_part" size="1">
                            @foreach( App\Models\Utilities::PART as $key => $want_part)
                                <option value="{{$key}}" @if($key == $band_info['want_part'] )selected @endif>{{$want_part}}</option>
                            @endforeach
                        </select>
                    </p>
                    <p>主な活動地域: 
                        <select name="area" size="1">
                            @foreach( App\Models\Utilities::AREA as $key => $area)
                                <option value="{{$key}}" @if($key == $band_info['area'] )selected @endif>{{$area}}</option>
                            @endforeach
                        </select>
                    </p>
                    <p>今いるパート: 
                        <select name="band_part" size="1">
                            @foreach( App\Models\Utilities::PART as $key => $band_part)
                                <option value="{{$key}}" @if($key == $band_info['band_part'] )selected @endif>{{$band_part}}</option>
                            @endforeach
                        </select>
                    </p>
                    <p>曲のジャンル: 
                        <select name="category" size="1">
                            @foreach( App\Models\Utilities::CATEGORY as $key => $category)
                                <option value="{{$key}}" @if($key == $band_info['category'] )selected @endif>{{$category}}</option>
                            @endforeach
                        </select>
                    </p>
                    <p>カバーorオリジナル: 
                        <select name="style" size="1">
                            @foreach( App\Models\Utilities::STYLE as $key => $style)
                                <option value="{{$key}}" @if($key == $band_info['style'] )selected @endif>{{$style}}</option>
                            @endforeach
                        </select>
                    </p>
                    </div>
                    <button type="submit">更新する</button></a>
                </div>
            </div>
        </div>
    </body>
</html>
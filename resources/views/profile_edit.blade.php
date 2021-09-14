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

        <title>プロフィール編集画面</title>
        <meta name="description" content="プロフィール編集画面">
    </head>

    <body>
        <header class="title">
            <h1>Assemble</h1>
            <p><a href="/logout">ログアウトする</a></p>
        </header>

        <div class="main">
            <!--サイドメニュー-->
            <div class="side">
                <ul class="nav">
                    <!--マイページ-->
                    <div class="list">
                        <li class="nav-item">
                            <a href="/profile">マイページ</a>
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
                    <p class="name">名前:<input type="text" name="name" value="{{$user['name']}}"></p>
                        @csrf
                        <textarea class="intro-edit" name='introduction'>{{$person_info['introduction']}}</textarea>
                        
                    <!--パート、経歴、居住地、性別、やりたいジャンル-->
                    <div class="details">
                        
                        <p>パート:
                            <select name="part" size="1">
                                @foreach( App\Models\Utilities::PART as $key => $part)
                                    <option value="{{$key}}" @if($key == $person_info['part'] )selected @endif>{{$part}}</option>
                                @endforeach
                            </select>

                        </p>
                        <p>楽器経歴:
                            <select name="year" size="1">
                                @foreach( App\Models\Utilities::YEAR as $key => $year)
                                    <option value="{{$key}}" @if($key == $person_info['year'] )selected @endif>{{$year}}</option>
                                @endforeach
                            </select>
                        </p>
                        <!-- 47都道府県 -->
                        <p>居住地:
                            <select name="area" size="1">
                                @foreach( App\Models\Utilities::AREA as $key => $area)
                                    <option value="{{$key}}" @if($key == $person_info['area'] )selected @endif>{{$area}}</option>
                                @endforeach
                            </select>
                        </p>
                        <p>性別:
                            <select name="gender" size="1">
                                @foreach( App\Models\Utilities::GENDER as $key => $gender)
                                    <option value="{{$key}}" @if($key == $person_info['gender'] )selected @endif>{{$gender}}</option>
                                @endforeach
                            </select>
                        </p>
                        <p>好きな曲:
                            <input type="text" name="song" value='{{$person_info['song']}}'>
                        </p>
                        <p>やりたいジャンル:
                            <select name="category" size="1">
                                @foreach( App\Models\Utilities::CATEGORY as $key => $category)
                                    <option value="{{$key}}" @if($key == $person_info['category'] )selected @endif>{{$category}}</option>
                                @endforeach
                            </select>
                        </p>
                    </div>
                    <button type="submit">更新する</button></a>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
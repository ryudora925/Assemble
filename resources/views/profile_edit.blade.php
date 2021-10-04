<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{asset('css/style.css')}}">
        <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
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
        <!--ヘッダー、タイトル-->
        @include('layouts/header')
        
        <div class="main">
            <!--サイドメニュー-->
            @include('layouts/side')

            <!--メイン-->
            <div class="profile-area">
                
                <!--プロフィール画像-->
                <div class="profile-icon">
                    @if($user->icon)
                    <img src="{{ asset('storage/'.$user->icon) }}" alt="" name="MyIcon" id="MyIcon">
                    @else
                    <img src="{{ asset('/images/default.jpeg') }}" alt="" id="MyIcon">
                    @endif
                    <form method="POST" action="{{ route('profile_edit_store') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="icon" id="icon" class="file">
                    @if($errors->first('icon'))
                        <strong class="validation">{{ $errors->first('icon') }}</strong>
                    @endif
                </div>

                <!--名前、自己紹介文-->
                <div class="myself">
                    <p class="name">名前:<input type="text" name="name" value="{{$user['name']}}"></p>
                        @if($errors->first('name'))
                            <strong class="validation">{{ $errors->first('name') }}</strong>
                        @endif
                        @csrf
                        <textarea class="intro-edit" name='introduction'>{{$person_info['introduction']}}</textarea>
                        @if($errors->first('introduction'))
                            <strong class="validation">{{ $errors->first('introduction') }}</strong>
                        @endif
                        
                    <!--パート、経歴、居住地、性別、やりたいジャンル-->
                    <div class="details">
                        
                        <p>パート:
                            <select name="part" size="1">
                                @foreach( App\Models\Utilities::PART as $key => $part)
                                    <option value="{{$key}}" @if($key == $person_info['part'] )selected @endif>{{$part}}</option>
                                @endforeach
                            </select>
                            @if($errors->first('part'))
                                <strong class="validation">{{ $errors->first('part') }}</strong>
                            @endif

                        </p>
                        <p>楽器経歴:
                            <select name="year" size="1">
                                @foreach( App\Models\Utilities::YEAR as $key => $year)
                                    <option value="{{$key}}" @if($key == $person_info['year'] )selected @endif>{{$year}}</option>
                                @endforeach
                            </select>
                            @if($errors->first('year'))
                                <strong class="validation">{{ $errors->first('year') }}</strong>
                            @endif
                        </p>
                        <!-- 47都道府県 -->
                        <p>居住地:
                            <select name="area" size="1">
                                @foreach( App\Models\Utilities::AREA as $key => $area)
                                    <option value="{{$key}}" @if($key == $person_info['area'] )selected @endif>{{$area}}</option>
                                @endforeach
                            </select>
                            @if($errors->first('area'))
                                <strong class="validation">{{ $errors->first('area') }}</strong>
                            @endif
                        </p>
                        <p>性別:
                            <select name="gender" size="1">
                                @foreach( App\Models\Utilities::GENDER as $key => $gender)
                                    <option value="{{$key}}" @if($key == $person_info['gender'] )selected @endif>{{$gender}}</option>
                                @endforeach
                            </select>
                            @if($errors->first('gender'))
                                <strong class="validation">{{ $errors->first('gender') }}</strong>
                            @endif
                        </p>
                        <p>好きな曲:
                            <input type="text" name="song" value="{{$person_info['song']}}">
                            @if($errors->first('song'))
                                <strong class="validation">{{ $errors->first('song') }}</strong>
                            @endif
                        </p>
                        <p>やりたいジャンル:
                            <select name="category" size="1">
                                @foreach( App\Models\Utilities::CATEGORY as $key => $category)
                                    <option value="{{$key}}" @if($key == $person_info['category'] )selected @endif>{{$category}}</option>
                                @endforeach
                            </select>
                            @if($errors->first('category'))
                                <strong class="validation">{{ $errors->first('category') }}</strong>
                            @endif
                        </p>
                    </div>
                    <button type="submit">更新する</button></a>
                    </form>
                </div>
            </div>
        </div>
        <script src="{{ asset('/js/side.js') }}"></script>
    </body>
</html>
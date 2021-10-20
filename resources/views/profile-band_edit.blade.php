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
        <title>プロフィール画面</title>
        <meta name="description" content="プロフィール画面">
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
                    <form method="POST" action="{{ route('band_edit_store') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="icon" id="icon" class="file">
                    @if($errors->first('icon'))
                        <strong class="validation">{{ $errors->first('icon') }}</strong>
                    @endif
                </div>
                <!--名前、自己紹介文-->
                <div class="myself">
                    <p class="name">バンド名:<input type="text" name="name" value="{{$user['name']}}"></p>
                        @if($errors->first('name'))
                            <strong class="validation">{{ $errors->first('name') }}</strong>
                        @endif
                        @csrf
                        <textarea class="intro-edit" name='introduction' placeholder="現在のバンド構成、紹介文などを記入してください">{{$band_info['introduction'] ?? ''}}</textarea>
                        @if($errors->first('introduction'))
                            <strong class="validation">{{ $errors->first('introduction') }}</strong>
                        @endif
                    <!--パート、経歴、居住地、性別、やりたいジャンル-->
                    <div class="details">
                        <p>募集しているパート: 
                            <select name="want_part" size="1">
                                @foreach( App\Models\Utilities::PART as $key => $want_part)
                                    @if(!empty($band_info))
                                        <option value="{{$key}}" @if($key == $band_info['want_part'] )selected @endif>{{$want_part}}</option>
                                    @else
                                        <option value="{{$key}}" >{{$want_part}}</option>
                                    @endif
                                        @endforeach
                            </select>
                            @if($errors->first('want_part'))
                                <strong class="validation">{{ $errors->first('want_part') }}</strong>
                            @endif
                        </p>
                        <p>主な活動地域: 
                            <select name="area" size="1">
                                @foreach( App\Models\Utilities::AREA as $key => $area)
                                    @if(!empty($band_info))
                                        <option value="{{$key}}" @if($key == $band_info['area'] )selected @endif>{{$area}}</option>
                                    @else
                                        <option value="{{$key}}" >{{$area}}</option>
                                    @endif
                                @endforeach
                            </select>
                            @if($errors->first('area'))
                                <strong class="validation">{{ $errors->first('area') }}</strong>
                            @endif
                        </p>
                        <p>今いるパート: 
                            @if(!empty($band_info))
                                <input type="text" name="band_part" value="{{$band_info['band_part']}}" maxlength="64">
                            @else
                                <input type="text" name="band_part" value="" maxlength="64">
                            @endif
                            @if($errors->first('band_part'))
                                <strong class="validation">{{ $errors->first('band_part') }}</strong>
                            @endif
                        </p>
                        <p>曲のジャンル: 
                            <select name="category" size="1">
                                @foreach( App\Models\Utilities::CATEGORY as $key => $category)
                                    @if(!empty($band_info))
                                        <option value="{{$key}}" @if($key == $band_info['category'] )selected @endif>{{$category}}</option>
                                    @else
                                        <option value="{{$key}}" >{{$category}}</option>
                                    @endif
                                @endforeach
                            </select>
                            @if($errors->first('category'))
                                <strong class="validation">{{ $errors->first('category') }}</strong>
                            @endif
                        </p>
                        <p>カバーorオリジナル: 
                            <select name="style" size="1">
                                @foreach( App\Models\Utilities::STYLE as $key => $style)
                                    @if(!empty($band_info))
                                        <option value="{{$key}}" @if($key == $band_info['style'] )selected @endif>{{$style}}</option>
                                    @else
                                        <option value="{{$key}}" >{{$style}}</option>
                                    @endif
                                @endforeach
                            </select>
                            @if($errors->first('style'))
                                <strong class="validation">{{ $errors->first('style') }}</strong>
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
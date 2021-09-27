<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{asset('css/style.css')}}">
        <link rel="stylesheet" href="{{asset('css/bmesse.css')}}">
        <title>プロフィール画面</title>
        <meta name="description" content="プロフィール画面">
    </head>

    <body><!--バンドでログイン-->
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
                    @if($user_info->icon)
                    <img src="{{ asset('storage/'.$user_info->icon) }}" alt="">
                    @else
                    <img src="{{ asset('storage/user/default.jpeg') }}" alt="">
                    @endif
                </div>
                <!--名前、自己紹介文-->
                <div class="myself">
                    <p class="name">バンド名: {{$user_info['name']}}</p>
                    <p class="intro">{{$band_info['introduction']}}</p>
                    <!--パート、経歴、居住地、性別、やりたいジャンル-->
                    <div class="details">
                    @if(!empty($band_info))
                        <p>募集しているパート: {{App\Models\Utilities::PART[$band_info->want_part] }}</p>
                    @else
                        <p>募集しているパート:</p>
                    @endif
                    @if(!empty($band_info))
                        <p>主な活動地域: {{App\Models\Utilities::AREA[$band_info->area] }}</p>
                    @else
                        <p>主な活動地域:</p>
                    @endif
                    @if(!empty($band_info))
                        <p>今いるパート: {{$band_info['band_part']}}</p>
                    @else
                        <p>今いるパート:</p>
                    @endif
                    @if(!empty($band_info))
                        <p>曲のジャンル: {{App\Models\Utilities::CATEGORY[$band_info->category] }}</p>
                    @else
                        <p>曲のジャンル:</p>
                    @endif
                    @if(!empty($band_info))
                        <p>カバーorオリジナル: {{App\Models\Utilities::STYLE[$band_info->style] }}</p>
                    @else
                        <p>カバーorオリジナル:</p>
                    @endif
                    </div>
                    <a href="/profile-band_edit"><button>編集する</button></a>
                </div>
            </div>
        </div>
        
        <br>
        <div id="your_container">
            <div id="bms_messages_container">
                <form action="{{route('chat_store')}}" method="POST">  
                    @csrf
                    <input type ="hidden" name = "post_user_id" value = "{{Auth::id()}}">
                    <div id="bms_send">
                        <textarea id="bms_send_message" name = "message"></textarea>
                        <input type ="submit" id="bms_send_btn" value ="送信">
                    </div>
                </form>
                <div id="bms_messages">
                    @foreach($messages as $message)
                    <div class = "message_box">
                        <div class="chat-icon">
                            <img src="images/1.webp" alt="">
                        </div>
                        <div class = "chat_content">
                            <div class="bms_chat_user_name">{{$message->user['name']}}</div>
                                <div class="bms_message_text">{{$message['message']}}</div>
                        </div>
                        <div class="bms_clear"></div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </body>
</html>
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{asset('css/style.css')}}">
        <title>やり取り中一覧画面</title>
        <meta name="description" content="やり取り中一覧画面">
    </head>

    <body><!--バンドでログインしている時-->
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
                            <a href="/chat_list">やり取り中</a>
                        </li>
                    </div>
                </ul>
            </div>
        
            <!-- やり取り中のトーク一覧 -->
            <div class="chatbox">
                @foreach($chat_list as $key => $chat)
                <div class="chatlist">
                    <a href="/other-profile/{{ $chat->id }}"><img src="/storage/" alt=""></a>
                    <div class="chatinfo">
                        <a href="/other-profile/{{ $chat->id }}"><p class="name">{{ $chat->name }}</p></a>
                        @if($chat->band_area)
                        <p class="area">エリア：{{ App\Models\Utilities::AREA[$chat->band_area] }}</p>
                        @else
                        <p class="area">エリア：{{ App\Models\Utilities::AREA[$chat->person_area] }}</p>
                        @endif
                        <p class="update-at">{{ $chat->chat_time }}</p>
                        <p class="messsage">{{ Str::limit($chat->message,50) }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        
        </div>
    </body>
</html>
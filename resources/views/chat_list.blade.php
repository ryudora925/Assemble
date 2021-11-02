<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{asset('css/style.css')}}">
        <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
        <title>やり取り中一覧画面</title>
        <meta name="description" content="やり取り中一覧画面">
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-V7QX4T04RF"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'G-V7QX4T04RF');
        </script>
    </head>

    <body>
        <!--ヘッダー、タイトル-->
        @include('layouts/header')

        <div class="main">
            <!--サイドメニュー-->                       
            @include('layouts/side')
        

            <!-- やり取り中のトーク一覧 -->
            <div class="chatbox">
            @foreach($chat_list as $key => $chat)
                <div class="chatlist">
                    @if($chat->icon)
                    <img src="{{ asset('storage/'.$chat->icon) }}" alt="">
                    @else
                    <img src="{{ asset('/images/default.jpeg') }}" alt="">
                    @endif
                    
                    <div class="chatinfo">
                        
                        <a href="/other-profile/{{ $chat->id }}">
                        <p class="name">{{ $chat->name }}</p>
                        </a>
                            <!-- isset使う -->
                        @if(isset($chat->band_area))
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
        <script src="{{ asset('/js/side.js') }}"></script>
    </body>
</html>
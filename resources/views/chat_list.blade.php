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
    </head>

    <body>
        <!--ヘッダー、タイトル-->
        @include('layouts/header')

        <div class="main">
            <!--サイドメニュー-->
            @include('layouts/side')

        <!-- やり取り中のトーク一覧 -->
        @foreach($chat_list as $key => $chat)
        <div class="chatlist">
            <a href=""><img src="/storage/" alt=""></a>
            <div class="chatinfo">
                <p class="name">{{ $chat->name }}</p>
                <p class="area">エリア：{{ App\Models\Utilities::AREA[$chat->area] }}</p>
                <p class="update-at">{{ $chat->chat_time }}</p>
                <p class="messsage">{{ $chat->message }}</p>
            </div>
        </div>
        @endforeach
        <script src="{{ asset('/js/side.js') }}"></script>
    </body>
</html>
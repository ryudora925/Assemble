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
            
            <div class="chatlist">    
                <a href=""><img src="/storage/" alt=""></a>
                <div class="chatinfo">
                    <p class="name">タナカ</p>
                    <p class="update-at">2021/09/11 16:03</p>
                    <p class="messsage">メッセージ本文がここに入ります</p>
                </div>
            </div>
            
        </div>
        <script src="{{ asset('/js/side.js') }}"></script>
    </body>
</html>
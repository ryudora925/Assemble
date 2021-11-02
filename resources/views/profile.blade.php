<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{asset('css/style.css')}}">
        <link rel="stylesheet" href="{{asset('css/bmesse.css')}}">
        <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
        <title>プロフィール画面</title>
        <meta name="description" content="プロフィール画面">
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
            <!--メイン-->
            <div class="profile-area">
                <!--プロフィール画像-->
                <div class="profile-icon">
                    @if($user_info->icon)
                    <img src="{{ asset('storage/'.$user_info->icon) }}" alt="">
                    @else
                    <img src="{{ asset('/images/default.jpeg') }}" alt="">
                    @endif
                </div>
                <!--名前、自己紹介文-->
                <div class="myself">
                    <p class="name">名前: {{$user_info['name']}}</p>
                    @if(!empty($person_info))
                    <p class="intro">{{$person_info['introduction']}}</p>
                    @else
                    <p class="intro"></p>
                    @endif
                    <!--パート、経歴、居住地、性別、やりたいジャンル-->
                    <div class="details">
                        @if(!empty($person_info))
                            <p>パート: {{App\Models\Utilities::PART[$person_info->part] }}</p>
                        @else
                            <p>パート: </p>
                        @endif
                        @if(!empty($person_info))
                            <p>楽器経歴: {{App\Models\Utilities::YEAR[$person_info->year] }}</p>
                        @else
                            <p>楽器経歴: </p>
                        @endif
                        @if(!empty($person_info))
                            <p>居住地: {{App\Models\Utilities::AREA[$person_info->area] }}</p>
                        @else
                            <p>居住地: </p>
                        @endif
                        @if(!empty($person_info))
                            <p>性別: {{App\Models\Utilities::GENDER[$person_info->gender] }}</p>
                        @else
                            <p>性別: </p>
                        @endif
                        @if(!empty($person_info))
                            <p>好きな曲: {{ $person_info->song }}</p>
                        @else
                            <p>好きな曲: </p>
                        @endif
                        @if(!empty($person_info))
                            <p>やりたいジャンル: {{App\Models\Utilities::CATEGORY[$person_info->category] }}</p>
                        @else
                            <p>やりたいジャンル: </p>
                        @endif
                    </div>
                    <a href="/profile_edit"><button>編集する</button></a>
                </div>
            </div>
        </div>

        <br>
        <div id="your_container">
            <div id="bms_messages_container">
                <form action="{{route('chat_store')}}" method="POST">  
                    @csrf
                    <input type ="hidden" name = "post_user_id" value = "{{Auth::id()}}">
                    <!--validation-->
                    @if($errors->any())
                    <div class='alert alert-danger'>
                        <ul>
                            @foreach($errors->all() as $error)
                                <li><strong>{{ $error }}</strong></li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <div id="bms_send">
                        <textarea id="bms_send_message" name = "message"></textarea>
                        <input type ="submit" id="bms_send_btn" value ="送信">
                    </div>
                </form>
                <div id="bms_messages">
                    @foreach($messages as $message)
                    <div class = "message_box">
                        <div class="chat-icon">
                            @if($message->user['icon'])
                            <img src="{{ asset('storage/'.$message->user['icon'] )}}" alt="">
                            @else
                            <img src="{{ asset('storage/user/default.jpeg') }}" alt="">
                            @endif
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
        <script src="{{ asset('/js/side.js') }}"></script>
    </body>
</html>
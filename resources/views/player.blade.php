<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{asset('css/style.css')}}">
        <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
        <title>一覧画面</title>
        <meta name="description" content="一覧画面">
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

            <!--ユーザ一覧-->
            <div class="content">
                <div class="grid">
                @foreach($players as $player)
                    <div class="item">
                        @if($player->band_flag === 0)
                            <p>名前:{{ $player->name }}</p>
                        @else
                            <p>バンド名:{{ $player->name }}</p>
                        @endif

                        @if($player->icon)
                             <a href="/other-profile/{{ $player->id }}"><img src="{{ asset('/storage/'.$player->icon) }}" alt=""></a>
                        @else
                             <a href="/other-profile/{{ $player->id }}"><img src="{{ asset('/images/default.jpeg') }}" alt=""></a>
                        @endif

                        @if($player->band_flag === 0)
                            @if($player->PersonInfo->part)
                            <p>パート:{{ App\Models\Utilities::PART[$player->PersonInfo->part] }}</p>
                            @else
                            <p>パート:</p>
                            @endif
                        @else
                            @if($player->BandInfo->want_part)
                            <p>募集パート:{{ App\Models\Utilities::PART[$player->BandInfo->want_part] }}</p>
                            @else
                            <p>募集パート:</p>
                            @endif
                        @endif

                        @if($player->band_flag === 0)
                            @if($player->PersonInfo->category)
                            <p>やりたいジャンル:<span class="br_">{{ App\Models\Utilities::CATEGORY[$player->PersonInfo->category] }}</span></p>
                            @else
                            <p>やりたいジャンル:</p>
                            @endif
                        @else
                            @if($player->BandInfo->style)
                            <p>ジャンル:{{ App\Models\Utilities::CATEGORY[$player->BandInfo->category] }}</p>
                            @else
                            <p>ジャンル:</p>
                            @endif
                        @endif
                    </div>
                @endforeach
                <div class="item banner-item">
                    <!--仮バナー-->
                    <p>バナー</p>
                    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-5693013664527871" crossorigin="anonymous"></script>
                    <!-- バナー広告 -->
                    <ins class="adsbygoogle"
                        style="display:inline-block;width:120px;height:120px"
                        data-ad-client="ca-pub-5693013664527871"
                        data-ad-slot="8325157164"></ins>
                    <script>
                        (adsbygoogle = window.adsbygoogle || []).push({});
                    </script>
                </div>
                </div>
                <!--ページネーション-->
                @if(strlen($players->appends(request()->input())->links()) > 9)
                    {{ $players->appends(request()->input())->links('pagination::default') }}
                @endif
            </div>
        </div>
        <script src="{{ asset('/js/side.js') }}"></script>
    </body>
</html>
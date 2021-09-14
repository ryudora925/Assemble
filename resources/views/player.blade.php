<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{asset('css/style.css')}}">
        <title>一覧画面</title>
        <meta name="description" content="一覧画面">
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
                            <a href="">やり取り中</a>
                        </li>
                    </div>
                </ul>
            </div>

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
                             <a href="/other-profile/{{ $player->id }}"><img src="{{ asset('/storage/user/default.jpeg') }}" alt=""></a>
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
                            <p>やりたいジャンル:{{ App\Models\Utilities::CATEGORY[$player->PersonInfo->category] }}</p>
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
                </div>
                @if(strlen($players->appends(request()->input())->links()) > 9)
                    {{ $players->appends(request()->input())->links('pagination::default') }}
                @endif
            </div>
        </div>
    </body>
</html>
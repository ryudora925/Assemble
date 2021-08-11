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
            <p>ログアウト</p>
        </header>

        <div class="main">
            <!--サイドメニュー-->
            <div class="side">
                <ul class="nav">
                    <!--マイページ-->
                    <div class="list">
                        <li class="nav-item">
                            <a href="/profile-band">マイページ</a>
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
                        <p>名前:{{ $player->name }}</p>
                        <a href=""><img src="/storage/{{ $player->icon }}" alt=""></a>
                        @if($player->PersonInfo->part)
                        <p>パート:{{ App\Models\Utilities::PART[$player->PersonInfo->part] }}</p>
                        @else
                        <p>パート:</p>
                        @endif
                        @if($player->PersonInfo->category)
                        <p>やりたいジャンル:{{ App\Models\Utilities::CATEGORY[$player->PersonInfo->category] }}</p>
                        @else
                        <p>やりたいジャンル:</p>
                        @endif
                    </div>
                @endforeach
                </div>
            </div>
        </div>
    </body>
</html>
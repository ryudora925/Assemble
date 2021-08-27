<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{asset('css/style.css')}}">
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
            <!--メイン-->
            <div class="profile-area">
                <!--プロフィール画像-->
                <div class="profile-icon">
                    <img src="images/1.webp" alt="">
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
                    <a href=""><button>編集する</button></a>
                </div>
            </div>
        </div>
    </body>
</html>
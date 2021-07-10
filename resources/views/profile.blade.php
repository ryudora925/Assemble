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

    <body>
        <div class="signup text-center">
            <h1>Assemble</h1>
        </div>

        <div class="main">
            <!--サイドメニュー-->
            <div class="side">
                <ul class="nav flex-column">
                    <!--マイページ-->
                    <div class="list">
                        <li class="nav-item">
                            <a href="">マイページ</a>
                        </li>
                    </div>
                    <!--一覧-->
                    <div class="list">
                        <li class="nav-item">
                            <a href="">一覧</a>
                        </li>
                    </div>
                    <!--絞り込み-->
                    <div class="list">
                        <li class="nav-item">
                            <a href="">絞り込み</a>
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
                    <a href=""><img src="" alt="">画像</a>
                </div>
                <!--名前、自己紹介文-->
                <div class="myself">
                    <p class="name">名前: Matsuhashi Saneto</p>
                    <p class="intro">岐阜県の岐阜市に住んでいます。</p>
                    <!--パート、経歴、居住地、性別、やりたいジャンル-->
                    <div class="details">
                        <p>パート:</p>
                        <p>楽器経歴:</p>
                        <p>居住地:</p>
                        <p>性別:</p>
                        <p>やりたいジャンル:</p>
                    </div>
                    <button>編集する</button>
                </div>
            </div>
        </div>
    </body>
</html>
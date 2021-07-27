<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{asset('css/style.css')}}">
        <title>絞り込み画面</title>
        <meta name="description" content="絞り込み画面">
    </head>

    <body><!--個人でログインしている時-->
        <header class="title">
            <h1>Assemble</h1>
            <p>絞り込み</p>
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
                            <a href="">一覧</a>
                        </li>
                    </div>
                    <!--絞り込み-->
                    <div class="list">
                        <li class="nav-item">
                            <a href="/search-band">絞り込み</a>
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

            <!--個人でログインしていて、バンドを探す。-->
            <div class="search-band">
                <form action="" method="POST">
                    <!--バンド探し-->
                    <div class="search">
                        <label for="SearchPart">募集しているパート</label><br>
                        <select name="" id="SearchPart">
                            <option value="">選択して下さい</option>
                            <option value="">ギター</option>
                            <option value="">アコースティックギター</option>
                            <option value="">ベース</option>
                            <option value="">ドラム</option>
                            <option value="">ボーカル</option>
                            <option value="">キーボード</option>
                        </select>
                    </div>

                    <div class="search">
                        <label for="ActivePlace">バンドの活動地域</label><br>
                        <select name="" id="ActivePlace">
                            <option value="">選択して下さい</option>
                            <option value="">北海道</option>
                            <option value="">東北</option>
                            <option value="">関東</option>
                            <option value="">中部</option>
                            <option value="">近畿</option>
                            <option value="">中国</option>
                            <option value="">四国</option>
                            <option value="">九州・沖縄</option>
                        </select>
                    </div>

                    <div class="search">
                        <label for="career">バンド歴</label><br>
                        <select name="" id="carrer">
                            <option value="">個人を探したい場合に選択</option>
                            <option value="">1〜3年</option>
                            <option value="">3〜5年</option>
                            <option value="">5〜8年</option>
                            <option value="">8〜10年</option>
                            <option value="">10年以上</option>
                        </select>
                    </div>

                    <!--絞り込み情報送信-->
                    <div class="narrow">
                        <input type="submit" value="絞り込む" class="narrow">
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
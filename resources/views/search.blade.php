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

            <!--バンドでログインしていて、個人を探す-->
            <div class="search-individual">
                <form action="/player" method="GET">
                    <!--個人探し-->
                    <div class="search">
                        <label for="part">探しているパート</label><br>
                        <select name="part" id="part">
                            <option value="">選択して下さい</option>
                            <option value="1">アコースティックギター</option>
                            <option value="2">エレキギター</option>
                            <option value="3">ベース</option>
                            <option value="4">ドラム</option>
                            <option value="5">キーボード</option>
                            <option value="6">ボーカル</option>
                            <option value="7">DJ</option>
                        </select>
                    </div>

                    <div class="search">
                        <label for="area">居住地</label><br>
                        <select name="area" id="area">
                            <option value="">選択して下さい</option>
                            <option value="1">北海道</option>
                            <option value="2">青森県</option>
                            <option value="3">岩手県</option>
                            <option value="4">宮城県</option>
                            <option value="5">秋田県</option>
                            <option value="6">山形県</option>
                            <option value="7">福島県</option>
                            <option value="8">茨城県</option>
                            <option value="9">栃木県</option>
                            <option value="10">群馬県</option>
                            <option value="11">埼玉県</option>
                            <option value="12">千葉県</option>
                            <option value="13">東京都</option>
                            <option value="14">神奈川県</option>
                            <option value="15">新潟県</option>
                            <option value="16">富山県</option>
                            <option value="17">石川県</option>
                            <option value="18">福井県</option>
                            <option value="19">山梨県</option>
                            <option value="20">長野県</option>
                            <option value="21">岐阜県</option>
                            <option value="22">静岡県</option>
                            <option value="23">愛知県</option>
                            <option value="24">三重県</option>
                            <option value="25">滋賀県</option>
                            <option value="26">京都府</option>
                            <option value="27">大阪府</option>
                            <option value="28">兵庫県</option>
                            <option value="29">奈良県</option>
                            <option value="30">和歌山県</option>
                            <option value="31">鳥取県</option>
                            <option value="32">島根県</option>
                            <option value="33">岡山県</option>
                            <option value="34">広島県</option>
                            <option value="35">山口県</option>
                            <option value="36">徳島県</option>
                            <option value="37">香川県</option>
                            <option value="38">愛媛県</option>
                            <option value="39">高知県</option>
                            <option value="40">福岡県</option>
                            <option value="41">佐賀県</option>
                            <option value="42">長崎県</option>
                            <option value="43">熊本県</option>
                            <option value="44">大分県</option>
                            <option value="45">宮崎県</option>
                            <option value="46">鹿児島県</option>
                            <option value="47">沖縄県</option>
                        </select>
                    </div>

                    <div class="search">
                        <label for="year">楽器経歴</label><br>
                        <select name="year" id="year">
                            <option value="">選択して下さい</option>
                            <option value="1">〜半年</option>
                            <option value="2">半年〜1年</option>
                            <option value="3">1〜3年</option>
                            <option value="4">3〜5年</option>
                            <option value="5">5年〜</option>
                        </select>
                    </div>

                    <div class="search">
                        <label for="gender">性別</label><br>
                        <input type="radio" name="gender" value="1" id="gender">男性
                        <input type="radio" name="gender" value="2" id="gender">女性
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

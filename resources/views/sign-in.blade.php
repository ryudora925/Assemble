<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{asset('css/style.css')}}">
        <title>ログイン画面</title>
        <meta name="description" content="ログイン画面">
    </head>

    <body>
        <div id="full-screen">
            <div class="signin text-center">
                <h1>Assemble</h1>
                <h2>Assembleにログイン</h2>

                <main class="form-signin">
                    <form action="" method="POST">
                        <input type="email" class="form-control" name="email" placeholder="メールアドレス">
                        <input type="password" class="form-control" name="password" placeholder="パスワード">
                        <button>ログイン</button>
                    </form>

                    <p><a href="/sign-up">ユーザ(個人)登録する</a></p>
                    <p><a href="/sign-up-band">ユーザ(バンド)登録する</a></p>
                </main>
            </div>
        </div>
    </body>

</html>
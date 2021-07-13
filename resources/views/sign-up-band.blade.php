<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{asset('css/style.css')}}">
        <title>新規登録(バンド)画面</title>
        <meta name="description" content="新規登録(バンド)画面">
    </head>

    <body>
        <div id="full-screen">
            <div class="signup text-center">
                <h1>Assemble</h1>
                <h2>新規登録(バンド)</h2>

                <main class="form-signup">
                    <form action="" method="POST">
                        <input type="text" class="form-control" name="name" placeholder="バンド名">
                        <input type="email" class="form-control" name="email" placeholder="メールアドレス">
                        <input type="password" class="form-control" name="password" placeholder="パスワード">
                        <input type="password" class="form-control" name="password2" placeholder="パスワードの再入力">

                        <button>登録する</button>
                    </form>
                </main>
            </div>
        </div>
    </body>

</html>
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{asset('css/style.css')}}">
        <title>ログイン画面</title>
        <meta name="description" content="ログイン画面">
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
        <div id="full-screen">
            <div class="signin text-center">
                <div class="welcome-title">
                    <h1>Assemble</h1>
                </div>
                <h2>Assembleにログイン</h2>

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

                <main class="form-signin">
                    <form action="/login" method="POST">
                        @csrf
                        <div><input type="email" class="form-control" name="email" placeholder="メールアドレス" value="{{ old('email') }}"></div>
                        <div><input type="password" class="form-control" name="password" placeholder="パスワード"></div>
                        <button>ログイン</button>
                    </form>

                    <p><a href="/sign-up">ユーザ(個人)登録する</a></p>
                    <p><a href="/sign-up-band">ユーザ(バンド)登録する</a></p>
                </main>
            </div>
        </div>
    </body>
</html>
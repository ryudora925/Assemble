<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{asset('css/style.css')}}">
        <title>新規登録(個人)画面</title>
        <meta name="description" content="新規登録(個人)画面">
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
            <div class="signup text-center">
                <div class="welcome-title">
                    <h1>Assemble</h1>    
                </div>
                <h2>新規登録(個人)</h2>
            
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

            <main class="form-signup">
                <form action="{{route('profile')}}" method="POST">
                @csrf
                    <div><input type="text" class="form-control" name="name" placeholder="名前"></div>
                    <div><input type="email" class="form-control" name="email" placeholder="メールアドレス"></div>
                    <div><input type="password" class="form-control" name="password" placeholder="パスワード"></div>
                    <div><input type="password" class="form-control" name="password_confirmation" placeholder="パスワードの再入力"></div>
                    <input type="hidden" name="band_flag" value=0>
                    <button>登録する</button>
                </form>
                <p><a href="/">戻る</a></p>
            </main>
        </div>
    </body>

</html>
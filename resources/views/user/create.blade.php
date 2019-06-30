<html>
    <head>
        <meta charset="utf-8">
        <title>Laravel Test</title>
    </head>
    <body>
        <h1>ユーザ作成画面</h1>
        <form action="/user" method="post">
            {{ csrf_field() }}
            <div>
                <label>名前</label>
                <input type="text" name="name" value="{{ $user['name'] }}" required="required">
                @if($errors->has('name'))
                    {{ $errors->first('name') }}
                @endif
            </div>
            <div>
                <label>メールアドレス</label>
                <input type="email" name="email" value="{{ $user['email'] }}" required="required">
                @if($errors->has('email'))
                    {{ $errors->first('email') }}
                @endif
            </div>
            <div>
                <label>パスワード</label>
                <input type="password" name="password" required="required">
                @if($errors->has('password'))
                    {{ $errors->first('password') }}
                @endif
            </div>
            <button type="submit">登録</button>
        </form>
    </body>
</html>

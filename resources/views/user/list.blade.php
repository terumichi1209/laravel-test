<html>
    <head>
        <meta charset="utf-8">
        <title>Laravel Test</title>
    </head>
    <body>
        @if (session('success_message'))
            <div>{{ session('success_message') }}</div>
        @elseif (session('error_message'))
            <div>{{ session('error_message') }}</div>
        @endif
        <h1>ユーザ一覧</h1>
        <a href="/user/create">ユーザ作成</a>
        <table>
            <tr>
                <th>ユーザ名</th>
                <th>メールアドレス</th>
            </tr>
            @foreach ($users as $user)
            <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
            </tr>
            @endforeach
        </table>
    </body>
</html>

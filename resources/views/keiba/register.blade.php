<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="utf-8">
  <title>競馬SNS(仮)</title>
  <link rel="stylesheet" href="{{asset('css/reset.css')}}">
  <link rel="stylesheet" href="{{asset('css/style.css')}}">
  <link rel="stylesheet" href="{{asset('css/color.css')}}">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv=" X-UA-Compatible" content="ie=edge">
</head>

<body>
  <header class="main_color">
    <h1>競馬SNS(仮)</h1>
  </header>
  <main class="base_color">
    <x-auth-session-status :status="session('status')" />

    <x-auth-validation-errors :errors="$errors" />
    <div class="login">
      <h2>アカウント作成</h2>
      <form method="POST" action="{{ route('register') }}">
        @csrf
        <div><input type="name" name="name" placeholder="ユーザーネーム"></div>
        <div><input type="email" name="email" placeholder="メールアドレス"></div>
        <div><input type="password" name="password" placeholder="パスワード"></div>
        <div><input type="password" name="password_confirmation" placeholder="確認パスワード"></div>
        <button type="submit">新規作成</button>
      </form>
      <a href="{{ route('login') }}">ログイン</a>
    </div>
  </main>

</body>

</html>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="utf-8">
  <title>競馬予想記録</title>
  <link rel="stylesheet" href="{{asset('css/reset.css')}}">
  <link rel="stylesheet" href="{{asset('css/style.css')}}">
  <link rel="stylesheet" href="{{asset('css/color.css')}}">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv=" X-UA-Compatible" content="ie=edge">
</head>

<body>
  <header class="main_color">
    <h1>競馬予想記録</h1>
  </header>
  <main class="base_color">
  <div class="error_msg">
    <x-auth-session-status :status="session('status')"/>
    <x-auth-validation-errors :errors="$errors"/>
  </div>
    <div class="login">
      <h2>ログイン</h2>
      <form method="POST" action="/login">
        @csrf
        <div><input type="email" name="email" placeholder="メールアドレス"></div>
        <div><input type="password" name="password" placeholder="パスワード"></div>
        <button type="submit">ログイン</button>
      </form>
      <a href="{{ route('register') }}">新規作成</a>
    </div>
  </main>

</body>

</html>
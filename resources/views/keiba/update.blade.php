<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="utf-8">
  <title>競馬SNS(仮)</title>
  <link rel="stylesheet" href="{{asset('css/reset.css')}}">
  <link rel="stylesheet" href="{{asset('css/main.css')}}">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv=" X-UA-Compatible" content="ie=edge">
</head>

<body>
  <header>
    <h1>競馬SNS(仮)</h1>
    <ul>
      <li>{{ Auth::user()->name }}</li>
      <li class="face"></li>
    </ul>
  </header>
  <main>
    <div class="nav">
      <ul>
        <li><a href="{{route('home')}}">トップへ</a></li>
        <li><a href="{{route('history')}}">予想履歴</a></li>
        <li><a href="{{route('look')}}">予想を見る</a></li>
        <li><a href="{{route('predict')}}">予想する</a></li>
        <li><a href="{{route('achievement')}}">回収率</a></li>
        <li>
          <form method="post" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="logout">ログアウト</button>
          </form>
        </li>
      </ul>
    </div>
    <div>
      <form method="post" action="{{route('storeUpdate')}}">
        @csrf
        <input type="hidden" name="id" value="{{$datas->id}}">
        <div>レース日<input type="date" name="date" value="{{$datas->date}}"></div>
        <div>レース名<input type="text" name="race" value="{{$datas->race}}"></div>
        <div>馬名<input type="text" name="name" value="{{$datas->name}}"></div>
        <div>印<select name="mark" class="field">
          <option value="1">◎</option>
          <option value="2">○</option>
          <option value="3">▲</option>
          <option value="4">△</option>
          <option value="5">☆</option>
          <option value="6">消</option>
        </select></div>
        <div>印の理由<textarea name="opinion">{{$datas->opinion}}</textarea></div>
        <button type="submit">編集</button>
      </form>
    </div>
    <footer>
      <form method="post" action="{{ route('logout') }}">
        @csrf
        <button type="submit">ログアウト</button>
      </form>
    </footer>

</body>

</html>
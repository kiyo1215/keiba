<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="utf-8">
  <title>競馬SNS(仮)</title>
  <link rel="stylesheet" href="{{asset('css/reset.css')}}">
  <link rel="stylesheet" href="{{asset('css/predict.css')}}">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv=" X-UA-Compatible" content="ie=edge">
</head>

<body>
  <header>
    <div class="title">
      <h1>競馬SNS(仮)</h1>
      <ul>
        <li>{{Auth::user()->name}}</li>
        <li class="face"></li>
      </ul>
    </div>
    <div class="nav">
      <ul>
        <li><a href="{{route('home')}}">トップへ</a></li>
        <li><a href="{{route('history')}}">予想履歴</a></li>
        <li><a href="{{route('look')}}">予想を見る</a></li>
        <li><a href="{{route('predict')}}">予想する</a></li>
        <li><a href="{{route('achievement')}}">年間回収率</a></li>
      </ul>
    </div>
  </header>
  <main>
    <h2>予想する</h2>
    <div class="predict">
      <form method="post" action="{{ route('predictCreate')}}">
        @csrf
        <div class="item">
          <p>レース日</p><input type="date" name="date" class="field text">
        </div>
        <div class="item">
          <p>レース名</p><input type="text" name="race" class="field text">
        </div>
        <div class="item">
          <p>馬の名前</p><input type="name" name="name" class="field text">
        </div>
        <div class="item">
          <p>印</p><select name="mark" class="field">
            <option value="1">◎</option>
            <option value="2">○</option>
            <option value="3">▲</option>
            <option value="4">△</option>
            <option value="5">☆</option>
            <option value="6">消</option>
          </select>
        </div>
        <div class="opinion">
          <p>印の理由</p><textarea name="opinion" class="opinion-field"></textarea>
        </div>
        <button type="submit">登録する</button>
      </form>
    </div>
  </main>
</body>

</html>
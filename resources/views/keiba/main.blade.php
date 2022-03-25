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
    <div class="main-image">
    </div>
    <div class="predict">
      <a href="{{ route('predict') }}">予想する</a>
    </div>
    <div class="contents">
      <div class="contents_item">
        <h2>予想履歴</h2>
        <ul>
          @foreach($my_datas as $my_data)
          <li>{{$my_data->race}} {{$my_data->name}}</li>
          @endforeach
        </ul>
      </div>
      <div class="contents_item">
        <h2>予想を見る</h2>
        <ul>
          @foreach($all_datas as $all_data)
          <li>{{$all_data->race}} {{$all_data->name}}</li>
          @endforeach
        </ul>
      </div>
      <div class="contents_item">
        <h2>回収率</h2>
      </div>
    </div>
  </main>
  <footer>
    <form method="post" action="{{ route('logout') }}">
      @csrf
      <button type="submit">ログアウト</button>
    </form>
  </footer>

</body>

</html>
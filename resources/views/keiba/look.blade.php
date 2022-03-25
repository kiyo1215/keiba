<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="utf-8">
  <title>競馬SNS(仮)</title>
  <link rel="stylesheet" href="{{asset('css/reset.css')}}">
  <link rel="stylesheet" href="{{asset('css/look.css')}}">
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
  <div class="nav">
    <ul>
      <li><a href="{{route('home')}}">トップへ</a></li>
      <li><a href="{{route('history')}}">予想履歴</a></li>
      <li><a href="{{route('look')}}">予想を見る</a></li>
      <li><a href="{{route('predict')}}">予想する</a></li>
      <li><a href="{{route('achievement')}}">年間回収率</a></li>
    </ul>
  </div>
  <main>
    <h2>予想を見る</h2>
    <form method="post" action="{{route('search_look')}}" class="search">
      @csrf
      レース日<input type="date" name="date">
      レース名<input type="text" name="race">
      馬名<input type="text" name="name">
      <button type="submit">検索</button>
    </form>
    <table>
      <tr>
        <th>ユーザーネーム</th>
        <th>レース日</th>
        <th>レース名</th>
        <th>印</th>
        <th>馬名</th>
        <th class="opinion-h">印の理由</th>
      </tr>
      @foreach($datas as $data)
      <tr class="data">
        <td>{{ $data->user->name }}</td>
        <td>{{ $data->date }}</td>
        <td>{{ $data->race }}</td>
        <td>
          @if($data->mark === 1)
          ◎
          @elseif($data->mark === 2)
          ○
          @elseif($data->mark === 3)
          ▲
          @elseif($data->mark === 4)
          △
          @elseif($data->mark === 5)
          ☆
          @elseif($data->mark === 6)
          消
          @endif
        </td>
        <td>{{ $data->name }}</td>
        <td class="opinion">{{ $data->opinion }}</td>
      </tr>
      @endforeach
    </table>
  </main>
  <footer>
    <form method="post" action="{{ route('logout') }}">
      @csrf
      <button type="submit">ログアウト</button>
    </form>
  </footer>

</body>

</html>
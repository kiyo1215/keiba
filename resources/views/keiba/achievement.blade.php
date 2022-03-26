<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="utf-8">
  <title>競馬SNS(仮)</title>
  <link rel="stylesheet" href="{{asset('css/reset.css')}}">
  <link rel="stylesheet" href="{{asset('css/achievement.css')}}">
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
    <form method="post" action="{{route('achieveCreate')}}">
      @csrf
      <div class="field">
        <p>賭け金</p>
        <input type="number" name="bet">円
      </div>
      <div class="field">
        <p>払い戻し金</p>
        <input type="number" name="refund">円
        <button type="button" onclick="calc(
          bet.value,
          refund.value);">計算する</button>
      </div>
      <div class="field">
        <p>回収率</p>
        <input type="number" id="recovery">％
        <button type="submit">保存する</button>
      </div>
    </form>
    <div class="result">
      <div class="year">
        <table>
          <tr>
            <th>年間回収率</th>
            <th></th>
          </tr>
          <tr>
            @foreach($years as $year)
            <td>{{$year->year}}</td>
            <td class="rate">
              @php
              echo round($year->refund / $year->bet * 100, 2);
              @endphp
              %
            </td>
            @endforeach
          </tr>
        </table>
      </div>
      <div class="month">
        <table>
          <tr>
            <th>月間回収率</th>
            <th></th>
          </tr>
          @foreach($datas as $data)
          <tr>
            <td>{{$data->date}}</td>
            <td class="rate">
              @php
              echo round($data->refund / $data->bet * 100, 2);
              @endphp
              %
            </td>
          </tr>
          @endforeach
        </table>
      </div>
    </div>
  </main>
  <footer>

  </footer>
  <script src="{{asset('js/calc.js')}}"></script>
</body>

</html>
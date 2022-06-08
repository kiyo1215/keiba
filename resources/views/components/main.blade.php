<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="utf-8">
  <title>競馬予想記録</title>
  <link rel="stylesheet" href="{{asset('css/reset.css')}}">
  <link rel="stylesheet" href="{{asset('css/color.css')}}">
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv=" X-UA-Compatible" content="ie=edge">
  <script src="https://kit.fontawesome.com/72d9c95907.js" crossorigin="anonymous"></script>
  <script src="{{asset('js/calc.js')}}"></script>
</head>

<body class="base_color">
  <header class="flex justify-between py-8 px-16 main_color">
    <h1 class="text-3xl font-bold text_color">競馬予想記録</h1>
    <p class="leading-10">{{ Auth::user()->name }}</p>
  </header>
  <main>
    <div class="sub_color px-16">
      <ul class="flex py-2">
        <li><a href="{{route('home')}}" class="text-xl">トップへ</a></li>
        <li class="ml-8"><a href="{{route('predict')}}" class="text-xl">予想する</a></li>
        <li class="ml-8"><a href="{{route('history')}}" class="text-xl">予想履歴</a></li>
        <li class="ml-8"><a href="{{route('look')}}" class="text-xl">予想を見る</a></li>
        <li class="ml-8"><a href="{{route('achievement')}}" class="text-xl">回収率</a></li>
        <li class="ml-8">
          <form method="post" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="logout text-xl">ログアウト</button>
          </form>
        </li>
      </ul>
    </div>
    <div class="px-16">
      {{ $slot }}
    </div>
  </main>
</body>

</html>
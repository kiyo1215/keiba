<x-main>
  <p class="leading-10">ユーザーネーム：{{$datas->user->name}}</p>
  <p class="leading-10">{{$datas->date}} {{$datas->race}}</p>
  <p class="leading-10">{{$datas->name}}</p>
  <p class="leading-10">
    @if($datas->mark === 1)
    ◎
    @elseif($datas->mark === 2)
    ○
    @elseif($datas->mark === 3)
    ▲
    @elseif($datas->mark === 4)
    △
    @elseif($datas->mark === 5)
    ☆
    @elseif($datas->mark === 6)
    消
    @endif
  </p>
  <p>{{$datas->opinion}}</p>
  <p class="fas my-10">&#xf004いいね：{{ $datas->likes->count() }}</p>
  @if($likes)
  <form action="{{route('notlike', $datas)}}" method="post">
    @csrf
    <input type="submit" value="&#xf004いいねを取り消す" class="fas btn h-10 w-40 rounded-lg accsent_color text-white">
  </form>
  @else
  <form action="{{route('like', $datas)}}" method="post">
    @csrf
    <input type="submit" value="&#xf004いいね" class="fas btn h-10 w-20 rounded-lg accsent_color text-white">
  </form>
  @endif
  <a href="/look" class="block w-20 mt-10 accsent_color text-white rounded-md leading-7 text-center">戻る</a>
</x-main>
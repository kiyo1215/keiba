<x-main>
  <main>
    <h2 class="text-2xl text-center text_color py-8 font-semibold">予想を見る</h2>
    <form method="post" action="{{ route('search_look') }}" class="bg-white p-8 mb-8 rounded-3xl">
      @csrf
      レース日<input type="date" name="date" class="border border-black mr-8 ml-4 bg-gray-100">
      レース名<input type="text" name="race" class="border border-black p-0.5 mr-8 ml-4 bg-gray-100">
      馬名<input type="text" name="horse_name" class="border border-black p-0.5 mr-8 ml-4 bg-gray-100">
      <button type="submit" class="border border-black accsent_color text-white p-1 rounded-md">検索</button>
    </form>
    <table class="w-full">
      <tr>
        <th class="w-32">ユーザーネーム</th>
        <th class="w-32">レース日</th>
        <th class="w-32">レース名</th>
        <th class="w-8">印</th>
        <th class="w-40">馬名</th>
        <th>印の理由</th>
        <th></th>
      </tr>
      @foreach($horses as $horse)
      <tr class="data leading-7">
        <td>{{ $horse->user->name }}</td>
        <td>{{ $horse->date }}</td>
        <td>{{ $horse->race }}</td>
        <td class="text-center">
          @if($horse->mark === 1)
          ◎
          @elseif($horse->mark === 2)
          ○
          @elseif($horse->mark === 3)
          ▲
          @elseif($horse->mark === 4)
          △
          @elseif($horse->mark === 5)
          ☆
          @elseif($horse->mark === 6)
          消
          @endif
        </td>
        <td class="">{{ $horse->horse_name }}</td>
        <td class="truncate max-w-sm">{{ $horse->opinion }}</td>
        <td>
          <a href="/look/show/{{$horse->id}}" class="block w-20 h-6 accsent_color text-white rounded-md text-center">詳細</a>
        </td>
      </tr>
      @endforeach
    </table>
    <div class="my-10">{{$horses->links()}}</div>
  </main>
</x-main>
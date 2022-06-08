<x-main>
  <main>
    <h2 class="text-2xl text-center text_color py-8 font-semibold">予想履歴</h2>
    <form method="post" action="{{route('search_history')}}" class="bg-white p-8 mb-8 rounded-3xl">
      @csrf
      レース日<input type="date" name="date" class="border border-black mr-8 ml-4 bg-gray-100">
      レース名<input type="text" name="race" class="border border-black p-0.5 mr-8 ml-4 bg-gray-100">
      馬名<input type="text" name="horse_name" class="border border-black p-0.5 mr-8 ml-4 bg-gray-100">
      <button type="submit" class="border border-black accsent_color text-white p-1 rounded-md">検索</button>
    </form>
    <table class="w-full border-b border-black">
      <tr class="border-b-2 border-black">
        <th class="w-32">レース日</th>
        <th class="w-32">レース名</th>
        <th class="w-8">印</th>
        <th class="w-40">馬名</th>
        <th>印の理由</th>
        <th class="w-20"></th>
        <th class="w-20"></th>
      </tr>
      @foreach($datas as $data)
      <tr class="border-b border-black leading-8">
        <td>{{ $data->date }}</td>
        <td>{{ $data->race }}</td>
        <td class="text-center">
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
        <td>{{ $data->horse_name }}</td>
        <td class="truncate max-w-sm hover:whitespace-normal hover:text-clip hover:overflow-visible">{{ $data->opinion }}</td>
        <td>
          <a href="/look/show/{{$data->id}}" class="block mx-4 accsent_color text-white rounded-md leading-7 text-center w-20">詳細</a>
        </td>
        <td>
          <a href="/history/update/{{$data->id}}" class="block mx-4 accsent_color text-white rounded-md leading-7 text-center w-20">編集</a>
        </td>
      </tr>
      @endforeach
    </table>
    <div class="my-10">{{$datas->links()}}</div>
  </main>
</x-main>
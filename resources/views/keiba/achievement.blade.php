<x-main>
  <main>
    <h2 class="text-center py-8 text-2xl">回収率({{$today}})</h2>
    <form method="post" action="{{route('achieveCreate')}}" class="bg-white p-8 mb-8 rounded-3xl">
      @csrf
      <div class="flex mb-4 h-8">
        <p class="w-24">賭け金</p>
        <input type="number" name="bet" class="border border-black bg-gray-100 p-1">円
      </div>
      <div class="flex mb-4 h-8">
        <p class="w-24">払い戻し金</p>
        <input type="number" name="refund" class="border border-black bg-gray-100 p-1">円
        <button type="button" onclick="calc(
          bet.value,
          refund.value);" class="text-white accsent_color p-1 ml-4">計算する</button>
      </div>
      <div class="flex h-8">
        <p class="w-24">回収率</p>
        <input type="number" id="recovery" class="border border-black bg-gray-100 p-1">％
        <button type="submit" class="text-white accsent_color p-1 ml-4">保存する</button>
      </div>
    </form>
    <div class="flex">
      <div class="w-6/12">
        <table>
          <tr>
            <th class="w-40">年間回収率</th>
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
        <div class="my-10">{{$years->links()}}</div>
      </div>
      <div class="w-6/12">
        <table>
          <tr>
            <th class="w-40">月間回収率</th>
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
        <div class="my-10">{{$datas->links()}}</div>
      </div>
    </div>
  </main>
</x-main>
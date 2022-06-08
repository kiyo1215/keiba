<x-main>
  <div class="px-8">
    <form method="post" action="{{route('storeUpdate')}}">
      @csrf
      <input type="hidden" name="id" value="{{$datas->id}}">
      <div class="flex mb-3.5">
        <p class="w-28">レース日</p><input type="date" name="date" value="{{$datas->date}}" class="border-2 border-black">
      </div>
      <div class="flex mb-3.5">
        <p class="w-28">レース名</p><input type="text" name="race" value="{{$datas->race}}" class="border-2 border-black">
      </div>
      <div class="flex mb-3.5">
        <p class="w-28">馬名</p><input type="text" name="horse_name" value="{{$datas->horse_name}}" class="border-2 border-black">
      </div>
      <div class="flex mb-3.5">
        <p class="w-28">印</p>
        <select name="mark" class="field" class="border-2 border-black">
          <option value="1">◎</option>
          <option value="2">○</option>
          <option value="3">▲</option>
          <option value="4">△</option>
          <option value="5">☆</option>
          <option value="6">消</option>
        </select>
      </div>
      <div class="flex mb-3.5">
        <p class="w-28">印の理由</p><textarea name="opinion" class="border-2 border-black h-60 w-9/12">{{$datas->opinion}}</textarea>
      </div>
      <button type="submit" class="block h-10 w-20 mx-auto mt-10 rounded-md border-2 border-black bg-black text-white">編集</button>
    </form>
  </div>
</x-main>
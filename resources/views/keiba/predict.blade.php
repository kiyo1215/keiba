<x-main>
  <main>
    <h2 class="text-center py-8 text-2xl">予想する</h2>
    <div class="mb-8">
      <form method="post" action="{{ route('predictCreate')}}" class="w-6/12 mx-auto">
        @csrf
        <div class="text-red-500 text-center">
          @if($errors->has('date'))
          {{ $errors->first('date')}}
          @endif
        </div>
        <div class="flex mb-8 bg-white p-6 rounded-3xl">
          <p class="w-36"><span>*</span>レース日</p><input type="date" name="date" class="border-2 bg-gray-100">
        </div>
        <div class="text-red-500 text-center">
          @if($errors->has('race'))
          {{ $errors->first('race')}}
          @endif
        </div>
        <div class="flex mb-8 bg-white p-6 rounded-3xl">
          <p class="w-36"><span>*</span>レース名</p><input type="text" name="race" class="border-2 bg-gray-100">
        </div>
        <div class="text-red-500 text-center">
          @if($errors->has('horse_name'))
          {{ $errors->first('horse_name')}}
          @endif
        </div>
          <div class="flex bg-white mb-8 p-6 rounded-3xl">
            <p class="w-36"><span>*</span>馬の名前</p><input type="name" name="horse_name" class="border-2 bg-gray-100">
          </div>
          <div class="flex bg-white mb-8 p-6 rounded-3xl">
            <p class="w-36"><span>*</span>印</p><select name="mark" class="border-2 bg-gray-100">
              <option value="1">◎</option>
              <option value="2">○</option>
              <option value="3">▲</option>
              <option value="4">△</option>
              <option value="5">☆</option>
              <option value="6">消</option>
            </select>
          </div>
          <div class="flex bg-white mb-8 p-6 rounded-3xl">
            <p class="w-3/12">印の理由</p><textarea name="opinion" class="border-2 h-40 w-9/12 bg-gray-100"></textarea>
          </div>
          <button type="submit" class="mx-auto text-2xl py-2 w-52 rounded-3xl text-center text-white block accsent_color">保存する</button>
      </form>
    </div>
  </main>
</x-main>

<style>
  span {
    color: red;
  }
</style>
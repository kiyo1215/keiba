<x-main>
  <main class="mb-20">
    <div class="bg-white my-16 pb-10 rounded-3xl drop-shadow-xl">
      <img src="{{asset('images/horse.png')}}" class="mx-auto h-64">
      <a href="{{ route('predict') }}" class="mx-auto text-4xl py-2 w-52 rounded-3xl text-center text-white block accsent_color">予想する</a>
    </div>
    <div class="contents">
      <a href="{{route('history')}}" class="contents_item">
        <img src="{{asset('images/predict.png')}}">
        <h2>予想履歴</h2>
      </a>
      <a href="{{route('look')}}" class="contents_item">
        <img src="{{asset('images/look.png')}}">
        <h2>予想を見る</h2>
      </a>
      <a href="{{route('achievement')}}" class="contents_item">
        <img src="{{asset('images/rate.png')}}">
        <h2>回収率</h2>
      </a>
    </div>
  </main>
</x-main>

<style>
  .contents {
    display: flex;
    justify-content: space-between;
  }

  .contents_item {
    width: 30%;
    background-color: white;
    padding: 30px 20px;
    border-radius: 20px;
    filter: drop-shadow(0 20px 13px rgb(0 0 0 / 0.03)) drop-shadow(0 8px 5px rgb(0 0 0 / 0.08));
  }

  .contents_item img {
    height: 200px;
    margin: 0 auto 30px;
  }

  .contents_item h2 {
    font-size: 25px;
    font-weight: bold;
    color: rgb(45, 45, 45);
    text-align: center;
    margin-bottom: 15px;
  }
</style>
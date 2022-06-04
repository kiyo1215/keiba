@props(['errors'])

@if ($errors->any())
<div {{ $attributes }}>
    <div class="text-red text-center attributes">
        {{ __('エラー内容を確認してください') }}
    </div>

    <ul class="text-red text-center">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<style>
    .text-red {
        color: red;
    }

    .text-center {
        text-align: center;
    }

    .attributes {
        font-size: 20px;
        font-weight: bold;
        padding-top: 30px;
    }
</style>
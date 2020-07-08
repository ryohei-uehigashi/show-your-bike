@extends('layouts.app')

@section('content')

  <div class="container">

    <h1>ShowYourBike - Post</h1>

    {{-- 投稿フォーム --}}
    <form action="/index" method="post" enctype="multipart/form-data" class="form-controll">
      @csrf
      {{-- 画像(最大3枚) --}}
      <div class="form-group parent">
        <input type="file" id="image" name="image" class="form-control-file mb-2 image" id="form-group">
      </div>
      {{-- フォーム追加 --}}
      <button class="add btn btn-primary mr-2" id="add">+</button>
      <button class="del btn btn-danger" id="del">-</button>
      {{-- 文章 --}}
      <div class="form-group">
        <textarea id="tweet" name="tweet" cols="50" rows="10" class="form-group mt-3"></textarea>
      </div>
      {{-- 送信 --}}
      <button type="submit" class="btn btn-primary">Up Road</button>
    </form>

    {{-- バリデーションメッセージ --}}
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($error->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <button class="mt-4" onclick="location.href='./index'">投稿一覧</button>

  </div>
@endsection
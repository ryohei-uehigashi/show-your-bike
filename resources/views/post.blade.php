@extends('layouts.app')

@section('content')

  <div class="container">

    <h1>ShowYourBike - Post</h1>

    {{-- 投稿フォーム --}}
    <form action="/post" method="post" enctype="multipart/form-data" class="form-controll">
      @csrf
      {{-- 画像(最大3枚) --}}
      <div id="parent" class="form-group">
        <div>
          <input type="file" name="image" class="form-control-file mb-2 image" onChange="imgPreview(event, 'preview')">
          {{-- プレビュー親要素 --}}
          <div id="preview"></div>
        </div>
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

  <script>
    // プレビュー
    function imgPreview(event, id) {
      let file = event.target.files[0];
      let reader = new FileReader();
      let preview = document.getElementById(id);

      // すでにプレビューがある場合
      if (preview.lastElementChild) {
        // 削除
        preview.lastElementChild.remove();
      }
    
      reader.onload = function(event) {
        let img = document.createElement("img");
        img.setAttribute("src", reader.result);
        preview.appendChild(img);
      };
      reader.readAsDataURL(file);
};
  </script>
@endsection
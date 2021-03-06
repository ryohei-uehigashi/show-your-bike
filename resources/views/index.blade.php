@extends('layouts.app')

@section('content')
<div class="container">
  <h1>ShowYourBike </h1>
  <button class="mb-3" onclick="location.href='./post'">投稿する</button>
<button class="mb-3" onclick="location.href='./user/{{Auth::id()}}'">MyPage</button>
    @foreach($posts as $post)
      <div class="card mb-3" style="width:18rem;">
        <div class="row">
          <img class="col card-img-top" src="{{$post->image}}">
          <img class="col card-img-top" src="{{$post->image2}}">
          <img class="col card-img-top" src="{{$post->image3}}">
        </div>
        <div class="card-body">
          <div class="row">
          <a href="/user/{{$post->user_id}}">{{$post->name}}</a>
            {{-- 投稿者が自分のとき --}}
            @if($post->id == $user_id)
              {{-- ボタン表示しない --}}
            {{-- フォローしている時 --}}
            @elseif ($post->is_followed)
              {{-- フォロー解除ボタン --}}
              <form action="/follow/delete" method="post">
                @csrf
                <button type="submit" class="btn btn-success btn-sm" name="followed_id" value={{$post->id}}>Follow中</button>
              </form>
            @else
              {{-- フォローボタン --}}
              <form action="/follow" method="post">
                @csrf
                <button type="submit" class="btn btn-primary btn-sm" name="followed_id" value={{$post->id}}>Follow</button>
              </form>
            @endif
          </div>
          <p>{{$post->updated_at}}</p>
          <p class="card-text">{{$post->tweet}}</p>
        </div>
      </div>
    @endforeach

</div>
@endsection
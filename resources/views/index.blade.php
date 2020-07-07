@extends('layouts.app')

@section('content')
<div class="container">
  <h1>ShowYourBike </h1>
  <button class="mb-3" onclick="location.href='./post'">投稿する</button>
    @foreach($posts as $post)
      <div class="card mb-3" style="width:18rem;">
        <img src="{{$post->image}}">
        <img src="{{$post->image2}}">
        <img src="{{$post->image3}}">
        <div class="card-body">
          <div class="row">
            {{-- <p class="mr-3">{{$user->name}}</p> --}}
            <p>{{$post->updated_at}}</p>
          </div>
          <p class="card-body">{{$post->tweet}}</p>
        </div>
      </div>
    @endforeach

</div>
@endsection
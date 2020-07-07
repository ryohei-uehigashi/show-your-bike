<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{
  // ページ表示
  public function post() {
    return view('post');
  }

// 投稿
  public function upload(Request $request) {
    // バリデーション
    $validator = Validator::make($request->all(),[
      'tweet' => 'required|max:140',
      'image' => 'required|file|image'
    ],[
      'tweet.required' => '内容を記入してください',
      'tweet.max' => '140文字以内で記入してください',
      'image.required' => '画像が選択されていません'
    ]);

    // if (request()->file) {
      $image = $request->file('image');
      // dd($image);
      $path = Storage::disk('s3')->putFile('myprefix', $image, 'public');

      $image = Storage::disk('s3')->url($path);
    // }
    Post::create([
      'user_id' => Auth::id(),
      'date' => $request->date,
      'tweet' => $request->tweet,
      'image' => $image,
    ]);

    return redirect('/index');
  }
}
?>
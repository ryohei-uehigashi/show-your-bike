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

    // 1枚目取得
      $image = $request->file('image');
      $path = Storage::disk('s3')->putFile('myprefix', $image, 'public');
      $image = Storage::disk('s3')->url($path);
    
    // 2枚取得
      $image2 = $request->file('image2');
      // dd($image2);
    if ($image2) {
      $path = Storage::disk('s3')->putFile('myprefix', $image2, 'public');
      $image2 = Storage::disk('s3')->url($path);
    }
    // 3枚目取得
    $image3 = $request->file('image3');
    if ($image3) {
      $path = Storage::disk('s3')->putFile('myprefix', $image3, 'public');
      $image3 = Storage::disk('s3')->url($path);
    }

    Post::create([
      'user_id' => Auth::id(),
      'date' => $request->date,
      'tweet' => $request->tweet,
      'image' => $image,
      'image2' => $image2,
      'image3' => $image3
    ]);

    return redirect('/index');
  }
}
?>
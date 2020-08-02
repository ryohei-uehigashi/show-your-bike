<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Index;
use App\Post;
use Illuminate\Support\Facades\Auth;
use App\Follow;

class IndexController extends Controller
{
  public function index() {
    // フォローしているユーザーのid取得
    $follows = Follow::where('following_id', '=', Auth::id())
      ->get();
    // フォローしているユーザー,自分（表示したいツイート）の配列
    $display_users = [];
    foreach ($follows as $follow) {
      array_push($display_users, $follow->followed_id);
    }
    // 自分のid追加
    array_push($display_users, Auth::id());

    // 投稿取得
    $posts = Post::select('posts.tweet', 'posts.image', 'posts.image2', 'posts.image3', 'posts.user_id', 'posts.updated_at', 'users.name', 'users.id')
      ->join('users', 'posts.user_id', '=', 'users.id')
      ->whereIn('user_id', $display_users)
      ->get();

    // 投稿一件づつ取り出し
    foreach ($posts as $post) {
      // フォロー情報
      $follow = Follow::where('following_id', '=', Auth::id())
        ->where('followed_id', '=', $post->id)
        ->first();
      // $followが存在するなら
      if ($follow) {
        // フォローされている
        $post->is_followed = true;
      } else {
        // されていない
        $post->is_followed = false;
      }
    }

    return view('index', [
      'posts'=>$posts,
      'user_id'=>Auth::id()
      ]);
  }
}

?>
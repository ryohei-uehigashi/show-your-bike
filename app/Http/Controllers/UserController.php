<?php 

namespace App\Http\Controllers;

use App\Post;
use App\Follow;
use App\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
  // 引数＝ルーティングの{}の中身
  public function user($id) {
    // ツイート
    $posts = Post::select('posts.tweet', 'posts.image', 'posts.image2', 'posts.image3', 'posts.updated_at', 'users.name', 'users.id')
      ->join('users', 'posts.user_id', '=', 'users.id')
      ->where('user_id', '=', $id)
      ->get();
    
    // フォローしているユーザー
    $follows = Follow::where('following_id', '=', $id)
      ->count();

    // フォロワー
    $followers = Follow::where('followed_id', '=', $id)
      ->count();

    return view('user', [
      'posts' => $posts,
      'follows' => $follows,
      'followers' => $followers
    ]);
  }
}
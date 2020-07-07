<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Index;
use App\Post;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
  public function index() {
    // 投稿取得
    $posts = Post::get();
    // ユーザー情報取得
    $user = Auth::user();
    return view('index', [
      'posts'=>$posts,
      'user'=>$user
      ]);
  }
}

?>
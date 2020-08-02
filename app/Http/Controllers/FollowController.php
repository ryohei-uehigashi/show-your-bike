<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Follow;
use Illuminate\Support\Facades\Auth;

class FollowController extends Controller
{
  // フォロー
  // カラム名 => <input name>
  public function follow(Request $request) {
    Follow::create([
      'following_id' => Auth::id(),
      'followed_id' => $request->followed_id
    ]);
    return redirect('/index');
  }

  public function delete(Request $request) {
    Follow::where('following_id', '=', Auth::id())
      ->where('followed_id', '=', $request->followed_id)
      ->delete();

    return redirect('/index');
  }
}
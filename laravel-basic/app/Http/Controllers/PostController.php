<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
  public function index()
  {
     // posts テーブルから全ての投稿を取得
     $posts = DB::connection('mysql2')->table('posts')->get();

     // 取得した投��を posts/index.blade.php へ��す
    return view('posts.index', compact('posts'));
  }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Post;


class PostController extends Controller
{
  public function index()
  {
     // データベース接続の確認
     $pdo = DB::connection('mysql2')->getPdo();
     $databaseName = $pdo->query('SELECT DATABASE()')->fetchColumn();
     dd('Connected to database: ' . $databaseName);
    // posts テーブルから全ての投稿を取得
    $posts = DB::connection('mysql2')->table('posts')->get();

    // 取得した投��を posts/index.blade.php へ��す
    return view('posts.index', compact('posts'));
  }
  public function show($id)
  {
    // URL'/posts/{id}'の'{id}'部分と主キー（idカラム）の値が一致するデータをpostsテーブルから取得し、変数$postに代入する
    $post = Post::find($id);

            // デバッグ用に追加
            if (is_null($post)) {
              dd("Post not found for ID: " . $id);
          }
  

    // 変数$postをposts/show.blade.phpファイルに渡す
    return view('posts.show', compact('post'));
  }
}

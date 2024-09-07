<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use App\Http\Requests\PostStoreRequest;



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
  



  // 新規作成フォームを表示するメソッド
  public function create()
  {
      return view('posts.create');
  }

  // フォーム送信後の確認画面を表示するメソッド
  public function confirm(Request $request)
  {
      // HTTPリクエストに含まれる、単一のパラメータの値を取得する     
      $user_name = $request->input('user_name');
      $user_email = $request->input('user_email');
      $user_gender = $request->input('user_gender');
      $category = $request->input('category');
      $message = $request->input('message');

      // HTTPリクエストメソッドを取得
      $method = $request->method();

      // HTTPリクエストのパスを取得
      $path = $request->path();

      // HTTPリクエストのURLを取得
      $url = $request->url();

      // HTTPリクエストを送信したクライアントのIPアドレスを取得
      $ip = $request->ip();

      $variables = [
          'user_name',
          'user_email',
          'user_gender',
          'category',
          'message',
          'method',
          'path',
          'url',
          'ip'
      ];

      return view('posts.confirm', compact($variables));
  }

  public function store(PostStoreRequest  $request)
{
    
  if ($errors = $request->session()->get('errors')) {
    return redirect()->back()->withErrors($errors)->withInput();
}
    // バリデーションを設定する
    $request->validate([
        'title' => 'required|max:20', // タイトルの最大文字数を20に設定
        'content' => 'required|max:200' // 本文の最大文字数を200に設定
    ]);

    // フォームの入力内容をもとに、テーブルにデータを追加する
    $post = new Post();
    $post->title = $request->input('title');
    $post->content = $request->input('content');
    $post->save();

    // リダイレクトさせる
    return redirect("/posts/{$post->id}");
}

}
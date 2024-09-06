<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Laravel基礎</title>
</head>

<body>
  <h1>投稿一覧</h1>
  @foreach($posts as $post)
  <div>
    <h2>{{ $post->title }}</h2>
    <p>{{ $post->content }}</p>

  </div>
  @endforeach
</body>
<td>{{ $post->id }}</td>

</html>
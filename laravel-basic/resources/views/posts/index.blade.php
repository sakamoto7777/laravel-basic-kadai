<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Laravel基礎</title>
</head>

<body>
<h1>新規投稿作成</h1>

  @if ($errors->any())
      <div>
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif

  <form method="POST" action="{{ route('posts.store') }}">
    @csrf
    <div>
        <label for="title">タイトル:</label>
        <input type="text" id="title" name="title" value="{{ old('title') }}">
        @error('title')
            <div>{{ $message }}</div>
        @enderror
    </div>
    <div>
        <label for="content">本文:</label>
        <textarea id="content" name="content">{{ old('content') }}</textarea>
        @error('content')
            <div>{{ $message }}</div>
        @enderror
    </div>
    <button type="submit">投稿する</button>
</form>

</html>
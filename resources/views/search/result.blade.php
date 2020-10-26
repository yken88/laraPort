@extends('layouts.master')
@section('title', '申し送り一覧')
@section('overview', '申し送り、しっかり確認しましょう。')
@section('content')

<div class="text-center col-md-4">
    <form action="{{ route('post.search') }}" method="post">
      <select name="user_id" class="form-control input">
        <option value="">ユーザID</option>
      </select>
      <br>
      <select name="title" class="form-control input">
        <option value="">タイトル</option>
        <option></option>
      </select>
      <br>
      <select name="created_at" class="form-control input">
        <option value="">作成日</option>
      </select>

    </form>
</div>
<br>
<div class="text-right">
  <a href="post/create" class="btn btn-outline-dark">新規作成</a>
</div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">投稿者</th>
      <th scope="col">タイトル</th>
      <th scope="col">内容</th>
      <th scope="col">日付</th>
      <th scope="col">ボタン</th>
    </tr>
  </thead>
  @foreach($posts as $post)
  <tbody>
    <tr>
      <th scope="col">{{ $post->user->name }}</th>
      <td>{{ $post->title }}</td>
      <td>{{ $post->content }}</td>
      <td>{{ $post->created_at }}</td>
     <td>
      <a href="post/{{ $post->id }}/edit" class="btn btn-primary mb-2">変更</a> 
      <a href="post/{{ $post->id }}/show" class="btn btn-secondary mb-2">詳細</a>
      <a href="post/{{ $post->id }}/delete" class="btn btn-danger">削除</a>
    </td>
    </tr>
    </tbody>
    @endforeach
</table>
 {{ $posts ?? ''->links() }}
@endsection
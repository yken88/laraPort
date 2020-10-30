@extends('layouts.master')
@section('title', '申し送り一覧')
@section('overview', '申し送り、しっかり確認しましょう。')

@section('content')
<div class="text-center col-md-6">
  <div class="container">
  <br>
    <form action="{{ route('post.search') }}" method="get">
      <div class="form-group">
        <select name="user_id" class="form-control">
        <option></option>
        @foreach($users as $user)
          <option value="{{ $user->id }}">{{ $user->name}}</option>
          @endforeach
        </select>
        <br>
        <select name="resident_id" class="form-control">
            <option></option>
            @foreach($residents as $resident )
            <option value="{{ $resident->id }}">{{ $resident->resident_name }}</option>
            @endforeach
        </select>
      </div>
      <input type="submit" class="btn btn-outline-danger" value="絞り込む">
    </form>
</div>
</div>
<br>
<div class="text-center">
  <a href="post/create" class="btn btn-outline-dark mb-2">新規作成</a>
</div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">😋</th>
      <th scope="col">入居者</th>
      <th scope="col">タイトル</th>
      <th scope="col">内容</th>
      <th scope="col">日付</th>
      <th scope="col">ボタン</th>
    </tr>
  </thead>
@foreach($posts as $post)
  <tbody>
    <tr>
      <td>{{ $post->user->name }}</td>
      <td>{{ $post->resident->resident_name}}様</td>
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
@endsection
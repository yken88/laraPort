@extends('layouts.master')
@section('title', '申し送り一覧')
@section('overview', '申し送り、しっかり確認しましょう。')

@section('content')
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
  <tbody>
    <tr>
      <td>{{ $item->user->name }}</td>
      <td>{{ $item->resident->resident_name }}</td>
      <td>{{ $item->title }}</td>
      <td>{{ $item->content }}</td>
      <td>{{ $item->created_at }}</td>
     <td>
      <a href="post/{{ $item->id }}/edit" class="btn btn-primary mb-2">変更</a> 
      <a href="post/{{ $item->id }}/show" class="btn btn-secondary mb-2">詳細</a>
      <a href="post/{{ $item->id }}/delete" class="btn btn-danger">削除</a>
    </td>
    </tr>
    </tbody>
</table>
@endsection
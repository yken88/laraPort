@extends('layouts.master')
@section('title', '新規作成')
@section('overview', '申し送りを入力してください。')
@section('content')
<form action="{{ route('post.store') }}" method="post">
@csrf
<div class="form-group">
    <label for="exampleInputEmail1">投稿者</label>
        {{ $user->name }}
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">タイトル</label>
    <input type="text" name="title" class="form-control" placeholder="タイトル">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">内容</label>
    <textarea name="content" class="form-control" placeholder="内容"></textarea>
  </div>
  <div class="text-right">
  <button type="submit" class="btn btn-primary ">登録する</button>
  </div>
</form>
@endsection
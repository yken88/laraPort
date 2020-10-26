@extends('layouts.master')
@section('title', '申し送り編集')
@section('overview', '新しい申し送りの変更事項を入力してください。')
@section('content')
<form action="" method="post">
@csrf
<div class="form-group">
    <label for="exampleInputEmail1">タイトル</label>
    <input type="text" name="title" class="form-control" placeholder="{{ $post->title }}">

  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">内容</label>
    <input  name="content" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="{{ $post->content }}">
  </div>
  <div class="text-right">
  <button type="submit" class="btn btn-primary">更新する</button>
  </div>
</form>
@endsection
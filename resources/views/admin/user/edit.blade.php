@extends('layouts.master')
@section('title', '編集')
@section('overview', '新しいユーザー情報を入力してください。')
@section('content')
<form action="/edit" method="post">
@csrf
<div class="form-group">
    <label for="exampleInputEmail1">お名前</label>
    <input type="text" name="name" class="form-control" placeholder="{{ $user->name }}">

  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">メールアドレス</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="{{ $user->email }}">
  </div>
  <button type="submit" class="btn btn-primary">更新する</button>
</form>
@endsection
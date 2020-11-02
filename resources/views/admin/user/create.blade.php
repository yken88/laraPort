@extends('layouts.master')
@section('title', '新規登録')
@section('overview', 'ようこそ、新しいユーザー情報を入力してください')
@section('content')
<form action="{{ route('user.store') }}" method="post">
@csrf
<div class="form-group">
    <label for="name">お名前</label>
    <input type="text" name="name" class="form-control" placeholder="お名前">

  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">メールアドレス</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="メールアドレス">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">パスワード</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="パスワード">
  </div>
  <!-- <div class="form-group">
    <label for="exampleInputPassword1">パスワード(確認)</label>
    <input type="password" name="password2" class="form-control" id="exampleInputPassword1" placeholder="パスワード（確認）">
  </div> -->
  <button type="submit" class="btn btn-primary">登録する</button>
</form>
@endsection
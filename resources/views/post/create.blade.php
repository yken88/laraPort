@extends('layouts.master')
@section('title', '新規作成')
@section('overview', '申し送りを入力してください。')
@section('content')

@if($errors->any())
<div class="alert alert-danger">
  <ul>
    @foreach($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif
<form action="{{ route('post.store') }}" method="post">
@csrf
<div class="form-group">
    <label for="exampleInputEmail1">投稿者</label>
        {{ $user->name }}
  </div>
  <div class="form-group">
    <label for="resident_id">入居者</label>
    <select name="resident_id" class="form-control col-md-4">
    @foreach($residents as $resident)
      <option value="{{ $resident->id }}">{{ $resident->resident_name}}様</option>
    @endforeach
    </select>
  </div>
  <div class="form-group">
    <label for="title">タイトル</label>
    <input type="text" name="title" class="form-control" placeholder="タイトル">
  </div>
  <div class="form-group">
    <label for="content">内容</label>
    <textarea name="content" class="form-control" placeholder="内容"></textarea>
  </div>
  <div class="text-right">
  <a href="{{ route('post.index') }}" class="btn btn-outline-primary"><i class="fa fa-arrow-left" aria-hidden="true"></i>一覧に戻る</a>
  <button type="submit" class="btn btn-primary ">登録する</button>
  </div>
</form>
@endsection
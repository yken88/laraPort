@extends('layouts.master')
@section('title', '申し送り編集')
@section('overview', '新しい申し送りの変更事項を入力してください。')
@section('content')
<form action="" method="post">
@csrf
<div class="form-group">
     <label for="resident">入居者 :</label>
        <select name="resident_id" class="form-control col-md-6">
            <option value="{{ $post->resident->id }}">{{ $post->resident->resident_name }} 様</option>
            @foreach($residents as $resident )
            <option value="{{ $resident->id }}">{{ $resident->resident_name }} 様</option>
            @endforeach
        </select>
      <br> 
      <label for="unit">ユニット :</label>
          <select name="unit_id" class="form-control col-md-6">
                <option value="{{ $post->unit->id }}">{{ $post->unit->unit_name }}</option>
                @foreach($units as $unit )
                <option value="{{ $unit->id }}">{{ $unit->unit_name }}</option>
                @endforeach
          </select>
      <br>
    <label for="title">タイトル :</label>
        <input type="text" name="title" class="form-control" value="{{ $post->title }}">
      <br>
    <label for="content">内容 :</label>
        <input type="text" name="content" class="form-control" value="{{ $post->content }}">
  <div class="text-right">
  <br>
  <button type="submit" class="btn btn-outline-primary">更新する</button>
  </div>
  </div>
</form>
@endsection

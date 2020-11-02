@extends('layouts.master')
@section('title', '新規入居者登録')
@section('overview', '入居者の情報を入力してください。')

@section('content')
<form action="{{ route('admin.residents.store') }}" method="post">
@csrf
 <div class="form-group">       
    <label for="resident_name">お名前</label>
    <input type="text" name="resident_name" class="form-control">
  </div>
  <div class="form-group">
    <label for="age">年齢</label>
    <select name="age" class="form-control">
    @for($i = 60; $i < 120; $i++)
    <option value="{{$i}}">{{$i}}</option>
    @endfor
    </select>
    

  </div>
<!-- 性別判定 -->
<label class="my-1 mr-2" for="gender">性別</label>
  <select class="custom-select my-1 mr-sm-2" name="gender">
    <option selected>性別</option>
    <option value="1">男性</option>
    <option value="2">女性</option>
  </select>
  <div class="form-group">
    <label for="assistance">介助</label>
    <textarea type="text" name="assistance" class="form-control" placeholder="介助方法"></textarea>
  </div>
  <div class="form-group">
    <label for="info">情報</label>
    <textarea type="text" name="info" class="form-control" placeholder="情報を追加してください"></textarea>
  </div>
  <div class="form-group">
    <select name="unit_id" class="form-control">
    @for($i = 1; $i < 20; $i++)
        <option value="{{$i}}">{{$i}}</option>
    @endfor
    </select>
  </div>
  <button type="submit" class="btn btn-primary">登録する</button>
</form>
@endsection
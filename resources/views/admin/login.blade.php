@extends('layouts.master')

@section('title', '管理者ログイン')

@section('content')

@if ($errors->any())
    <ul class="error">
        @foreach($errors->all() as $error)
        <li>{{ $errors }}</li>
        @endforeach
    </ul>
@endif

<form method="post" class="form-group">
    @csrf

    <ul>
        <li>
        <label>ログインID</label>
        <input type="text" name="username" class="form-control" value="{{ old('username') }}">
        </li>
        <br>
        <li>
        <label>パスワード</label>
        <input type="password" name="password" class="form-control" value="{{ old('username') }}">
        </li>
    </ul>
    <div class="text-right">
    <button type="sumbit" class="btn btn-primary">ログイン</button>
    </div>
</form>
@endsection
@extends('layouts.master')
@section('title', 'ユーザ一覧')
@section('overview', 'ユーザーの一覧です。管理者しか見れない画面にする予定。てか検索機能も付けたいね。')
@section('content')
<div class="text-right">
  <a href="{{ route('admin.user.create') }}" class="btn btn-outline-dark">ユーザ新規登録</a>
</div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">USER_ID</th>
      <th scope="col">名前</th>
      <th scope="col">メールアドレス</th>
      <th scope="col">ユニット</th>
    </tr>
  </thead>
  @foreach($users as $user)
  <tbody>
    <tr>
      <th scope="row">{{ $user->id }}</th>
      <td>{{ $user->name }}</td>
      <td>{{ $user->email }}</td>
      <td>{{ $user->unit->floor }}階{{ $user->unit->unit_name }}</td>
      <td><a href="user/{{ $user->id }}/edit" class="btn btn-primary">編集</a></td>
      <td><a href="user/{{ $user->id }}/delete" class="btn btn-danger">削除</a></td>
    </tr>
　</tbody>
    @endforeach
</table>

{{ $users->links() }}
@endsection
@extends('layouts.master')
@section('title', 'ユーザ一覧')
@section('overview', 'ユーザーの一覧です。')
@section('content')
<p class="text-center text-danger">
@if(session('message'))
  {{ session('message') }}
@endif
@if(session('create_a_user'))
  {{ session('create_a_user') }}
@endif
@if(session('delete_a_user'))
  {{ session('delete_a_user') }}
@endif
</p>
<div class="text-right">
  <a href="{{ route('admin.user.create') }}" class="btn btn-outline-dark">ユーザ新規登録</a>
</div>
<div class="text-center">
  <p class="text-info">⬇️こちらからユーザーの検索が出来ます。
  </p>
</div>
<table class="table table-info">
  <thead>
    <tr>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row"></th>
      <form action="" method="get">
        <td>
          <input type="text" name="name" class="form-control" placeholder="ユーザの名前を入力してください。">
          <td>
            <div class="text-right">
              <input type="submit" class="btn btn-light" value="検索">
            </div>
          </td>
    </form>
  </div>
<br>

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
    <td><a href="{{ route('admin.user.delete', ['id' => $user->id]) }}" class="btn btn-danger">削除</a></td>
    </tr>
  </tbody>
    @endforeach
</table>
{{ $users->appends(Request::only('name'))->links()}}
@endsection
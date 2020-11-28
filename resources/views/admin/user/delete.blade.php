@extends('layouts.master')

@section('title','ユーザ削除確認画面')
@section('overview', '削除するユーザを確認してください。')

@section('content')

ユーザ名: {{ $user->name }}
<hr>
メールアドレス: {{ $user->email }}
<hr>
ユニット: {{ $user->unit->floor }}階{{ $user->unit->unit_name }}
<hr>

  <p class="text-danger text-right">
  このユーザを削除してもよろしいですか？<br>
    よろしれければ削除ボタンを押してください。
  </p>
      <!-- デリート機能 -->
      <div class="text-right">
        <form method="post">
        @csrf
        <a href="{{ route('admin.user.index') }}" class="btn btn-outline-info mr-3">
        ⬅️一覧に戻る</a>
        <button type="submit"  class="btn btn-outline-secondary">
          <i class="fa fa-btn fa-trash"></i> 削除
        </button>
        </div>
        </form>
       <hr>
@endsection
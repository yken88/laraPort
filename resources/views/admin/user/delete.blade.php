@extends('layouts.master')

@section('title','ユーザ詳細')

@section('content')

ユーザ名: {{ $user->name }}
<hr>
メールアドレス: {{ $user->email }}
<hr>
ユニット: {{ $user->unit->floor }}階{{ $user->unit->unit_name }}
<hr>

<p class="text-danger text-right">このユーザを削除してもよろしいですか？<br>
    宜れければ削除ボタンを押してください。</p>
      <!-- デリート機能 -->
      <div class="text-right">
      <form action="{{ route('admin.user.destroy', ['id' => $user->id ]) }}" method="POST">
      @csrf
      {{ method_field('DELETE') }}
      <button type="submit" id="delete-task-{{ $user->id }}" class="btn btn-danger">
        <i class="fa fa-btn fa-trash"></i> 削除
      </button>
      <a href="{{ route('admin.user.index') }}" class="btn btn-outline-primary">
      <i class="fa fa-arrow-left"></i>一覧に戻る</a>
      </div>
     <hr>
@endsection
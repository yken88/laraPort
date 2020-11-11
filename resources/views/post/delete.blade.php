@extends('layouts.master')

@section('title', '確認画面')
@section('overview', 'しっかりと確認し、削除ボタンを押してください。')

@section('content')
        投稿者: {{ $delete_post->user->name }}
        <hr>
        タイトル: {{ $delete_post->title }}
        <hr>
        内容： {{ $delete_post->content }}
        <hr>
        作成日: {{ $delete_post->created_at }}
       <hr>
      
      <p class="text-danger">この申し送りを削除してもよろしいですか？</p>
      <!-- デリート機能 -->
      <div class="text-right">
      <form action="{{ url('post/'.$delete_post->id) }}" method="POST">
      @csrf
      {{ method_field('DELETE') }}
      <button type="submit" id="delete-task-{{ $delete_post->id }}" class="btn btn-danger">
        <i class="fa fa-btn fa-trash"></i> 削除
      </button>
      <a href="{{ route('post.index') }}" class="btn btn-outline-primary">
      <i class="fa fa-arrow-left"></i>一覧に戻る</a>
      </div>
     <hr>
     

      
@endsection
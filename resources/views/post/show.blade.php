@extends('layouts.master')

@section('title', '申し送り詳細')
@section('overview', 'しっかりと確認し、完了したら確認ボタンを押してください。')

@section('content')
        投稿者: {{ $post->user->name }}
        <hr>
        タイトル: {{ $post->title }}
        <hr>
        内容： {{ $post->content }}
        <hr>
        作成日: {{ $post->created_at }}
       <hr>
      
      <!-- 編集と確認ボタン (ここはajaxでした方がいいかも。-->
      @if(!$checkedMember)
      <form action="/post/{{ $post->id }}/check" method="post">
      {{ csrf_field() }}
        <button type="sumbit" class="btn btn-primary">確認</button>
      </form>
      @else
      <form action="/post/{{ $post->id }}/cancel" method="post">
      {{ csrf_field() }}
        <button type="sumbit" class="btn btn-secondary">確認済</button>
      </form>
      @endif

      
@endsection
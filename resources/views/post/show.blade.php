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
      @if(!$checked)
      <form action="/post/{{ $post->id }}/check" method="get">
        @csrf
       <button type="sumbit" class="btn btn-primary">確認</button>
      </form>
      @else
        <button type="sumbit" class="btn btn-secondary">確認済</button>
      @endif
      <br>
      
      <h3>確認済ユーザ</h3>
        @foreach( $checkedMembers as $member)
        {{ $member->user->name }}
        @endforeach

      
@endsection
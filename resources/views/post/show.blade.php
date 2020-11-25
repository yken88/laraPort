@extends('layouts.master')

@section('title', '申し送り詳細')
@section('overview', 'しっかりと確認し、完了したら確認ボタンを押してください。')

@section('content')
  <div class="text-center">
        <h2>投稿者 : {{ $post->user->name }}</h2>
        <hr>
        <p>タイトル : {{ $post->title }}</p>
        <hr>
        <p>内容 : {{ $post->content }}</p>
        <hr>
        <p>作成日 : {{ $post->created_at }}</p>
       <hr>
  </div>
  <div class="text-right">
      @if(!$checked)
      <p class="text-info">確認して一覧に戻る⬇️</p>
      <form action="{{ route('post.check', ['id' => $post->id ]) }}" method="get">
        @csrf
       <button type="sumbit" class="btn btn-primary">確認</button>
      </form>
      @else
      <form action="{{ route('post.uncheck', ['id' => $post->id ])}}" method="post">
        @csrf
        <button type="sumbit" class="btn btn-secondary">確認済</button>
      </form>
      @endif

      <div class="mt-3">
      <p>確認済ユーザ</p>
        @foreach( $checkedMembers as $member)
        {{ $member->user->name }}
        @endforeach
      </div>
  </div>
@endsection
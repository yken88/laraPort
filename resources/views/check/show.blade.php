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
       <div class="row">
       <div class="container">    
        <a href="edit" class="btn btn-secondary mb-2">編集</a>
        
        <form action="" method="post">
        @csrf
        @if()
          <input type="submit" class="btn btn-primary" value="確認">
        @else
          <input type="submit" class="btn btn-secondary" value="確認">
        @endif
        </form>
        
        <a href="delete" class="btn btn-danger">削除</a>
        </div>
      </div>
      <!-- 確認したメンバーもチェックする。 -->
      <!-- @foreach( $checkedMembers as $checkedMember)
       <p>確認した従業員：{{ $checkedMember->name }}</p>
      @endforeach -->
      <p>確認済従業員:
        <br>
        @foreach( $checkedMembers as $checkedMember )
        {{ $checkedMember->user->name }}
        <br>
        @endforeach
     </p>
@endsection
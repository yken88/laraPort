@extends('layouts.master')
@section('title', '申し送り一覧')
@section('overview', '申し送り、しっかり確認しましょう。')

@section('content')
<div class="text-center col-md-6">
  <div class="container">
  <br>
    <form action="{{ route('post.search') }}" method="get">
      <div class="form-group">
        <select name="user_id" class="form-control">
        <option></option>
        @foreach($users as $user)
          <option value="{{ $user->id }}">{{ $user->name }}</option>
          @endforeach
        </select>
        <br>
        <select name="resident_id" class="form-control">
            <option></option>
            @foreach($residents as $resident )
            <option value="{{ $resident->id }}">{{ $resident->resident_name }}</option>
            @endforeach
        </select>
      </div>
      <input type="submit" class="btn btn-outline-danger" value="絞り込む">
    </form>
</div>
</div>
<br>
<div class="text-center">
  <a href="{{ route('post.create') }}" class="btn btn-outline-dark mb-2">新規作成</a>
</div>
<table class="table">
  <thead>
    <tr>
      <th scope="col" style="width:10%;">投稿者</th>
      <th scope="col" style="width:10%;">入居者</th>
      <th scope="col" style="width:10%;">タイトル</th>
      <th scope="col" style="width:40%;">内容</th>
      <th scope="col" style="width:12%;">日付</th>
      <th scope="col" style="width:18%;">ボタン</th>
    </tr>
  </thead>
@foreach($posts as $post)
  <tbody>
    <tr>
      <td>{{ $post->user->name }}</td>
      <td>{{ $post->resident->resident_name }}</td>
      <td>{{ $post->title }}</td>
      <td>{{ \Illuminate\Support\Str::limit($post->content, 70, $end='...') }}</td>
      <td>{{ $post->created_at }}</td>
     <td>
      <a href="{{ route('post.edit', ['id' => $post->id])}}" class="btn btn-primary">編集</a> 
      <a href="{{route('post.show', ['id' => $post->id])}}" class="btn btn-info">詳細</a>
      <a href="{{ route('post.delete', ['id' => $post->id]) }}" class="btn btn-outline-secondary mt-2">
      <i class="fa fa-btn fa-trash"></i> 削除</a>
    </td>
    </tr>
    </tbody>
    @endforeach
</table>
          @if (session('flash_message'))
            <div class="text-danger">
                {{ session('flash_message') }}
            </div>
          @endif
{{ $posts->appends(request()->input())->links() }}
@endsection
@extends('layouts.master')
@section('title', '申し送り一覧')
@section('overview', '申し送り、しっかり確認しましょう。')

@section('content')

<div class="text-right">
  <a href="{{ route('post.create') }}" class="btn btn-outline-info mb-3">新規作成</a>
</div>
<div class="text-center">
  <p class="text-info">⬇️こちらのから、投稿者・入居者・ユニットを選択して申し送りを絞り込めます。<br>
    複数選択、単一選択、どちらでも検索可能です。
  </p>
  <p class="text-danger">
  @if(session('flash_message'))
    ＊{{ session('flash_message')}}
  @endif
  @if(session('store'))
    {{ session('store') }}
  @endif
  </p>
</div>
<table class="table table-info">
  <thead>
    <tr>
      <th scope="col"></th>
      <th scope="col">投稿者</th>
      <th scope="col">入居者</th>
      <th scope="col">ユニット</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row"></th>
      <form action="{{ route('post.search') }}" method="get">
        <td>
          <select name="user_id" class="form-control">
            <option></option>
            @foreach($users as $user)
            <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
          </select></td>
        <td>
          <select name="resident_id" class="form-control">
            <option value=""></option>
            @foreach($residents as $resident )
            <option value="{{ $resident->id }}">{{ $resident->resident_name }}</option>
            @endforeach
          </select>
        </td>
        <td>
          <select name="unit_id" class="form-control">
            <option></option>
            @foreach($units as $unit )
            <option value="{{ $unit->id }}">{{ $unit->floor }}階{{ $unit->unit_name }}</option>
            @endforeach
          </select>
        </td>
        <td>
          <div class="text-right">
            <input type="submit" class="btn btn-light" value="絞り込む">
          </div>
        </td>
    </tr>
    </form>
    </div>
    <div>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col" style="width:10%;">投稿者</th>
            <th scope="col" style="width:10%;">ユニット</th>
            <th scope="col" style="width:10%;">入居者</th>
            <th scope="col" style="width:10%;">タイトル</th>
            <th scope="col" style="width:20%;">内容</th>
            <th scope="col" style="width:12%;">日付</th>
            <th scope="col" style="width:20%;">ボタン</th>
          </tr>
        </thead>
        @if(session('message'))
          <p class="text-danger text-right">
            ＊{{ session('message')}}
          </p>
        @elseif(session('delete'))
        <p class="text-danger text-right">
          ＊{{ session('delete')}}
        </p>
        @endif
        @foreach($posts as $post)
        <tbody>
          <tr>
            <td>{{ $post->user->name }}</td>
            <td>{{ $post->unit->unit_name }}</td>
            <td>{{ $post->resident->resident_name }}</td>
            <td>{{ $post->title }}</td>
            <td>{{ \Illuminate\Support\Str::limit($post->content, 70, $end='...') }}</td>
            <td>{{ $post->created_at }}</td>
            <td>
              <a href="{{ route('post.edit', ['id' => $post->id])}}" class="btn btn-primary">編集</a>
              <a href="{{ route('post.show', ['id' => $post->id])}}" class="btn btn-info">詳細</a>
              <a href="{{ route('post.delete', ['id' => $post->id]) }}" class="btn btn-outline-secondary">
                <i class="fa fa-btn fa-trash"></i> 削除</a>
            </td>
          </tr>
        </tbody>
        @endforeach
      </table>
      {{ $posts->appends(request()->input())->links() }}
    </div>
    </div>
    @if (session('flash_message'))
    <div class="text-danger">
      {{ session('flash_message') }}

      @endif
      @endsection
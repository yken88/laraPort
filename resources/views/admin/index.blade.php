@extends('layouts.master')

@section('title', '管理者用ページ')

@section('content')
    <ul>
        <li><a href="{{ route('admin.user.index') }}">ユーザ一覧</a></li>
        <li><a href="/admin/message">メッセージ</a></li>
        <li><a href="{{ route('admin.logout') }}">ログアウト</a></li>
    </ul>
@endsection
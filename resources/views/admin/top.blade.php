@extends('layouts.master')

@section('title', '管理者用ページ')

@section('content')
    <a href="{{ route('admin.user.index') }}">ユーザ管理</a>
    <a href="{{ route('admin.resident.index') }}">入居者管理</a>
@endsection
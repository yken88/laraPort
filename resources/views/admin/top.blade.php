@extends('layouts.admin_master')

@section('title', '管理者用ページ')


@section('content')
<div class="card text-center">
  <div class="card-header">
    機能１
  </div>
  <div class="card-body">
    <h5 class="card-title">ユーザ管理機能です</h5>
    <p class="card-text">新規の従業員や、退職した従業員の編集を行います。</p>
    <a href="{{ route('admin.user.index') }}" class="btn btn-outline-primary">ユーザ管理</a>
  </div>
  <div class="card-footer text-muted">
    ➡️
  </div>
</div>

<div class="card text-center mt-5">
  <div class="card-header">
    機能２
  </div>
  <div class="card-body">
    <h5 class="card-title">入居者の情報</h5>
    <p class="card-text">新規の入居者の登録や、入居者の状態を確認したり、編集を行います。</p>
    <a href="{{ route('admin.residents.index')}}" class="btn btn-outline-danger mt-3" >入居者管理</a>
  </div>
  <div class="card-footer text-muted">
    ➡️
  </div>
</div>
@endsection

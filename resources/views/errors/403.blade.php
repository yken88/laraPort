@extends('errors::minimal')

@section('title', '認可エラー')
@section('code', '403')
@section('message', __('この操作は、投稿者本人か管理者のみ実行できます。'))


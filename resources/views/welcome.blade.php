@extends('layouts.master')

@section('title', 'WELCOME')
@section('overview', 'welcome画面。もっとわかりやすく、綺麗にしたい。いろんな機能のガイドをnavをここに配置して、できるだけ分かりやすく。音声の機能いいかも。入居者の生の声を届けられる。')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                    <a href="/user" class="btn btn-danger mb-2">ユーザー一覧</a>
                    <br>
                    <a href="/post" class="btn btn-primary">申し送り一覧</a>
                    <br>
                    <a href="/search" class="btn btn-primary">検索</a>

                
            </div>
        </div>
    </div>               
</div>
@endsection

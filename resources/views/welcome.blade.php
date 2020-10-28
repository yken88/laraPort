@extends('layouts.master')

@section('title', 'WELCOME')
@section('overview', 'welcome画面。もっとわかりやすく、綺麗にしたい。いろんな機能のガイドをnavをここに配置して、できるだけ分かりやすく。音声の機能いいかも。入居者の生の声を届けられる。')

@section('content')
<div class="container">
        <div class="row d-flex justify-content-center" >
            <div class="card mr-3" style="width: 18rem;">
                <svg class="bd-placeholder-img card-img-top" width="100%" height="180" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Image cap"><title>Placeholder</title><rect fill="#868e96" width="100%" height="100%"/><text fill="#dee2e6" dy=".3em" x="50%" y="50%">Image cap</text></svg>
                <div class="card-body">
                    <h5 class="card-title bg-info p-3 rounded">ユーザ管理機能</h5>
                    <p class="card-text">現在、登録しているユーザを管理します。この機能は従業員のみ使用できます。</p>
                    <a href="/user" class="btn btn-primary mt-3">ユーザ一覧</a>
                </div>
            </div>

            <div class="card mr-3" style="width: 18rem;">
                <svg class="bd-placeholder-img card-img-top" width="100%" height="180" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Image cap"><title>Placeholder</title><rect fill="#868e96" width="100%" height="100%"/><text fill="#dee2e6" dy=".3em" x="50%" y="50%">Image cap</text></svg>
                <div class="card-body">
                    <h5 class="card-title">申し送り管理機能</h5>
                    <p class="card-text">あなたがお休みしている間に更新された、申し送りを確認できます。出勤当日に慌てずに済むように確認しておきましょう。</p>
                    <a href="/post" class="btn btn-primary">申し送り</a>
                </div>
            </div>

            <div class="card" style="width: 18rem;">
                <svg class="bd-placeholder-img card-img-top" width="100%" height="180" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Image cap"><title>Placeholder</title><rect fill="#868e96" width="100%" height="100%"/><text fill="#dee2e6" dy=".3em" x="50%" y="50%">Image cap</text></svg>
                <div class="card-body">
                    <h5 class="card-title">申し送り検索機能</h5>
                    <p class="card-text">検索機能。過去の申し送りを再確認したい時などに便利です。日付や入居者の名前から検索できます。</p>
                    <a href="/search" class="btn btn-primary">検索</a>
                </div>
        </div>
    </div>               
</div>
@endsection

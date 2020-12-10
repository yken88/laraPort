@section('title', 'WELCOME TO SEND')
<!DOCTYPE html>
<html lang="ja">

<head>
    @include('layouts.head')
    <link href="css/welcome.css?<?php echo date('Ymd-Hi'); ?>" rel="stylesheet">
</head>

<body>
    @include('layouts.header')
    <main class="main">
        <img src="./images/mainvisual.jpg" alt="ノートの写真">
        <div class="head-text col-md-4 col-sm-4">
            <h1>SEND</h1>
            <h3>申し送り管理サービス</h3>
            <p>あなたが欠勤していた時に起きたことを確認しましょう。</p>
            <a href="{{ route('admin.login') }}"
                class="btn btn-outline-dark d-md-none d-sm-inline-block mb-2">管理者ログイン</a>

            <a href="{{ route('login') }}" class="btn btn-outline-dark d-md-none d-sm-inline-block mr-2 ">ログイン</a>

            <a href="{{ route('register')}}" class="btn btn-outline-dark d-md-none d-sm-inline-block">登録</a>
        </div>
        <div class="form col-md-6 col-sm-4">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                    <div class="col-md-6">
                        <input id="password" type="password"
                            class="form-control @error('password') is-invalid @enderror" name="password" required
                            autocomplete="current-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>


                <div class="row mb-0 text-right">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Login') }}
                        </button>
                    </div>
                </div>
            </div>
        </form>

        </div>
        <div class="text-center oneclick-form">
            <p class="text-primary">閲覧用の簡単ログイン機能です。</p>

            <form action="{{ route('login')}}" method="POST">
                @csrf
            <input type="hidden" name="email" value="example@example.com">
                <input type="hidden" name="password" value="Password">
                <button type="submit" class="btn btn-outline-primary">ユーザ簡単ログイン</button>
            </form>
        </div>

    </main>

    <div class="description mt-5">
        <div class="container">
            <div class="text-center">
                <h2 class="mb-4 pb-2 d-inline-block font-weight-bold text-right">目的</h2>
                <p class="lead mb-5">
                    私が介護施設に務める中で、感じた不便を解消しようと作りました。<br>
                    施設で起きたこと、注意事項を申し送りノートに書き、出勤した時に確認すると言う作業を<br>
                    効率化するために、このサービスを考えました。<br>
                    施設に出勤していなくても確認できる申し送りノートです。
                </p>
                
                <h2 class="mb-3 pb-2 d-inline-block font-weight-bold">概要</h2>
                <p class="lead mb-5">
                    ユーザーは申し送りの閲覧、投稿、詳細確認、編集、削除、確認ができます。<br>
                    管理ユーザーはユーザ一覧、入居者一覧の確認、編集ができます。<br>
                    <br>
                    また、管理者は入居者のADL（日常生活動作）の状態を確認・編集できます。
                </p>
                
                <h2 class="mb-3 pb-2 d-inline-block font-weight-bold">使用した技術</h2>
                <table class="table table-bordered">
                    <thead class="text-center">
                      <tr>
                        <th style="width: 40%;"></th>
                        <th style="width: 60%;"></th>
                      </tr>
                    </thead>
                    <tbody class="text-center">
                      <tr>
                        <td>言語</td>
                        <td>php 7.4.2</td>
                      </tr>
                      <tr>
                        <td>フレームワーク</td>
                        <td>laravel 6.*</td>
                      </tr>
                      <tr>
                        <td>CSSフレームワーク</td>
                        <td>Bootstrap</td>
                      </tr>
                      <tr>
                        <td>Database</td>
                        <td>MySQL</td>
                      </tr>
                      <tr>
                        <td>deploy</td>
                        <td>Heroku</td>
                      </tr>
                      
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
    
    @include('layouts.footer')
</body>

</html>
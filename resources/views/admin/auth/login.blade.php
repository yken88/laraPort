@extends('layouts.admin_master')

@section('title', '管理者ログイン')

@section('content')

@if ($errors->any())
    <ul class="error">
        @foreach($errors->all() as $error)
        <li>{{ $errors }}</li>
        @endforeach
    </ul>
@endif

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.login') }}">
                        @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">ユーザ名</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="username">
                                </div>
                            </div>

                            <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">パスワード</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    <div class="text-center oneclick-form">
                        <p class="text-primary">閲覧用の簡単ログイン機能です。</p>
            
                        <form action="{{ route('admin.login')}}" method="POST">
                            @csrf
                            <input type="hidden" name="username" value="kentaro">
                            <input type="hidden" name="password" value="password">
                            <button type="submit" class="btn btn-outline-primary">ユーザ簡単ログイン</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
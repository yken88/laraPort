@extends('layouts.master')

@section('title', 'Send')
@section('overview', 'Welcome to Send')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                    <hr>
                <div class="row">
                    <a href="/user" class="btn btn-primary mr-2">ユーザ一覧</a>
                    <a href="/post" class="btn btn-primary">申し送り一覧</a>
                </div>
                    
                </div>
            </div>
        </div>
    </div>

               
</div>
                    

@endsection

@extends('layouts.master')

@section('title', '入居者')

@section('content')
@if(session('update'))
<div class="text-center">
  <p class="text-danger">{{ session('update') }}</p>
</div>
  
@endif
<table class="table table-info">
  <thead class="text-center">
    <tr>
      <th scope="row" class="">入居者検索</th>
      <th scope="row"></th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <form action="{{ route('admin.residents.index')}}" method="get">
        @csrf
        <td>
        <input type="text" name="resident_name" class="form-control" placeholder="入居者の名前を入力してください">
        </td>
        <td>
          <input type="submit" class="btn btn-light" value="検索">
        </td>
      </form>
    </tr>
    <table class="table table-bordered">
      <thead class="text-center">
        <tr>
          <th scope="col" style="width: 25%;">入居者名</th>
          <th scope="col" style="width: 25%;">年齢</th>
          <th scope="col" style="width: 25%;">ユニット</th>
          <th scope="col" style="width: 25%;"></th>
        </tr>
      </thead>
      <tbody class="text-center">
        @foreach( $residents as $resident )
        <tr>
          <td>{{ $resident->resident_name }}</td>
          <td>{{ $resident->age }}歳</td>
          <td>{{ $resident->unit->floor }}階{{ $resident->unit->unit_name}}</td>
          <td><a href="{{ route('admin.residents.show', ['id' => $resident->id ]) }}"
              class="btn btn-secondary">詳細・ADLを見る</a></td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <div class="container text-center">
      <a href="{{ route('admin.residents.create')}}" class="btn btn-info">入居者を新規登録</a>
    </div>
    @endsection
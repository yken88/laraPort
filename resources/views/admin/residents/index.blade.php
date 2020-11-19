@extends('layouts.master')

@section('title', '入居者')

@section('content')
<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col"></th>
      <th scope="col">入居者名</th>
      <th scope="col">年齢</th>
      <th scope="col">unit_id</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
  @foreach( $residents as $resident )
    <tr>
      <th scope="row"></th>
      <td>{{ $resident->resident_name }}</td>
      <td>{{ $resident->age }}歳</td>
      <td>{{ $resident->unit->unit_name }}</td>
      <td><a href="{{ route('admin.residents.show', ['id' => $resident->id ]) }}" class="btn btn-secondary">ADLを見る</a></td>
    </tr>
    @endforeach
  </tbody>
</table>
  <div class="container text-center">
    <a href="{{ route('admin.residents.create')}}" class="btn btn-info">入居者を新規登録</a>
  </div>
@endsection
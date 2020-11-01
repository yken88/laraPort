@extends('layouts.master')

@section('title', '入居者')

@section('content')
<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">入居者名</th>
      <th scope="col">誕生日</th>
      <th scope="col">unit_id</th>
      <th scope="col">unit_id</th>
    </tr>
  </thead>
  <tbody>
  @foreach( $residents as $resident )
    <tr>
      <th scope="row">1</th>
      <td>{{ $resident->resident_name }}</td>
      <td>{{ $resident->birthday }}</td>
      <td>{{ $resident->unit_id }}</td>
      <td><a href="{{ route('admin.residents.show', ['id' => $resident->id ]) }}" class="btn btn-secondary">ADLを見る</a></td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection
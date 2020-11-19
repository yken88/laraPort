@extends('layouts.master')

@section('title', '入居者一覧')
@section('overview', '入居者一覧です。編集は詳細画面から出来ます。')

@section('content')
<table class="table table-bordered">
  <thead>
    <tr class="text-center">
      <th scope="col" style="width: 20%;">入居者名</th>
      <th scope="col" style="width: 10%;">年齢</th>
      <th scope="col" style="width: 20%;">ユニット</th>
      <th scope="col" style="width: 30%;"></th>
    </tr>
  </thead>
  <tbody>
    @foreach( $residents as $resident )
    <tr class="text-center">
      <td>{{ $resident->resident_name }}</td>
      <td>{{ $resident->age }}歳</td>
      <td>{{ $resident->unit->floor }}階{{ $resident->unit->unit_name }}</td>
      <td><a href="{{ route('admin.residents.show', ['id' => $resident->id ]) }}" class="btn btn-outline-secondary">
          {{ $resident->resident_name }}様の詳細とADLを見る➡️</a></td>
    </tr>
    @endforeach
  </tbody>
</table>
  {{ $residents->appends(request()->input())->links() }}

<div class="container text-right">
  <a href="{{ route('admin.residents.create')}}" class="btn btn-info">入居者を新規登録</a>
</div>
@endsection
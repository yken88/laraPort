@extends('layouts.master')

@section('title', '簡易ADL')
@section('overview', '日常生活動作を把握しましょう。')

@section('content')

入居者名: {{ $resident->resident_name }}様
<hr>
年齢: {{ $resident->age }}歳
<hr>
ユニット: {{ $resident->unit->floor}}階{{ $resident->unit->unit_name}}
<hr>

<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">動作</th>
      <th scope="col">介助方法</th>
    </tr>
  </thead>
  <tbody>
    @foreach($adl as $item)
    <tr>
      <td>移乗</td>
      <td>{{ $item->移乗 }}</td>
    </tr>
    <tr>
      <td>トイレ動作</td>
      <td>{{ $item->トイレ動作}}</td>
    </tr>
    <tr>
      <td>平地歩行</td>
      <td>{{ $item->平地歩行}}</td>
    </tr>
    <tr>
      <td>食事</td>
      <td>{{ $item->食事}}</td>
    </tr>
    <tr>
      <td>排泄</td>
      <td>{{ $item->排泄}}</td>
    </tr>
    <tr>
      <td>入浴</td>
      <td>{{ $item->入浴}}</td>
    </tr>
    <tr>
      <td>更衣</td>
      <td>{{ $item->更衣 }}</td>
    </tr>
  </tbody>
</table>

<div class="container text-center">
  <div class="col-md-10 card">
    <label>備考</label>
    <hr>
    <p>{{ $item->備考 }}</p>
  </div>
</div>
@endforeach
<br>
<div class="container"
  <div class="text-right">
    <a href="{{ route('admin.adl.editAdl', ['id' => $item->id ]) }}" class="btn btn-outline-primary mr-2">ADL編集</a>
    <a href="{{ route('admin.residents.edit', ['id' => $item->resident->id ]) }}" class="btn btn-outline-primary mr-2">入居者編集</a>
    <a href="{{ route('admin.residents.index')}}" class="btn btn-outline-secondary">戻る</a>
  </div>

</div>



@endsection
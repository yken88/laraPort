@extends('layouts.master')

@section('title', '入居者編集。')
@section('overview', '変更事項を入力してください。')

@section('content')
<form action="" method="post">
    @csrf
    <div class="form-group">
        <label for="resident_name">お名前</label>
        <input type="text" name="resident_name" class="form-control" placeholder="{{ $resident->resident_name}}">

        <label for="age">年齢</label>
        <select name="age" class="form-control">
            @for($i = 60; $i < 120; $i++) <option value="{{$i}}">{{$i}}</option>
                @endfor
        </select>

        <!-- 性別判定 -->
        <label for="gender">性別</label>
        <select name="gender" class="custom-select">
            <option value=""></option>
            <option value="1">男性</option>
            <option value="2">女性</option>
        </select>

        <label for="assistance">介助</label>
        <textarea type="text" name="assistance" class="form-control"
            placeholder="{{ $resident->assistance }}"></textarea>

        <label for="info">情報</label>
        <textarea type="text" name="info" class="form-control" placeholder="{{ $resident->info }}"></textarea>

        <label for="info">ユニット</label>
        <select name="unit_id" class="form-control">
            @foreach ($unitSelectOptions as $unit)
            <option value="{{ $unit->id }}">{{ $unit->floor }}階{{ $unit->unit_name }}</option>
            @endforeach
        </select>
        <br>
        <div class="text-center">
            <button type="submit" class="btn btn-outline-primary">変更する</button>
        </div>
    </div>
</form>
@endsection
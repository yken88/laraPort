@extends('layouts.master')
@section('title', '編集')
@section('overview', 'ユーザー情報を更新できます。')
@section('content')
<form method="POST" action="">
  @csrf

  <div class="form-group row">
      <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

      <div class="col-md-6">
      <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>

          @error('name')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
      </div>
  </div>

  <div class="form-group row">
      <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

      <div class="col-md-6">
      <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}" required autocomplete="email">

          @error('email')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
      </div>
  </div>

  <div class="form-group row">
      <label for="unit_id" class="col-md-4 col-form-label text-md-right">ユニット</label>
      <div class="col-md-6">
      <select name="unit_id" class="form-control">
        @foreach( $units as $unit )
          <option value="{{ $unit->id}}">{{ $unit->floor }}階{{ $unit->unit_name }}</option>
        @endforeach
      </select>
      </div>
  </div>

  <div class="form-group row mb-0 text-right">
      <div class="col-md-6 offset-md-4">
          <button type="submit" class="btn btn-outline-primary">
              変更する
          </button>
      </div>
  </div>
</form>
@endsection
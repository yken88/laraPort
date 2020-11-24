@extends('layouts.master')

@section('title', '簡易ADL編集')

@section('content')

@foreach( $adls as $adl )
<div class="justify-content-center">
    <h3>{{ $adl->resident->resident_name }} 様</h3>
    <form action="" method="post">
        @csrf
        <div class="form-group">
            <label for="移乗">移乗</label>
            <select name="移乗" class="form-control">
                <option>{{ $adl->移乗 }}</option>
                <option value="自立">自立</option>
                <option value="要見守り">要見守り</option>
                <option value="一部介助">一部介助</option>
                <option value="全介助">全介助</option>
            </select>
        </div>
        <div class="form-group">
            <label for="トイレ動作">トイレ動作</label>
            <select name="トイレ動作" class="form-control">
                <option>{{ $adl->トイレ動作 }}</option>
                <option value="自立">自立</option>
                <option value="要見守り">要見守り</option>
                <option value="一部介助">一部介助</option>
                <option value="全介助">全介助</option>
            </select>
        </div>

        <div class="form-group">
            <label for="平地歩行">平地歩行</label>
            <select name="平地歩行" class="form-control">
                <option>{{ $adl->平地歩行 }}</option>
                <option value="自立">自立</option>
                <option value="要見守り">要見守り</option>
                <option value="一部介助">一部介助</option>
                <option value="全介助">全介助</option>
            </select>
        </div>

        <div class="form-group">
            <label for="食事">食事</label>
            <select name="食事" class="form-control">
                <option>{{ $adl->食事 }}</option>
                <option value="自立">自立</option>
                <option value="要見守り">要見守り</option>
                <option value="一部介助">一部介助</option>
                <option value="全介助">全介助</option>
            </select>
        </div>

        <div class="form-group">
            <label for="排泄">排泄</label>
            <select name="排泄" class="form-control">
                <option>{{ $adl->排泄 }}</option>
                <option value="自立">自立</option>
                <option value="要見守り">要見守り</option>
                <option value="一部介助">一部介助</option>
                <option value="全介助">全介助</option>
            </select>
        </div>

        <div class="form-group">
            <label for="入浴">入浴</label>
            <select name="入浴" class="form-control">
                <option>{{ $adl->入浴 }}</option>
                <option value="自立">自立</option>
                <option value="要見守り">要見守り</option>
                <option value="一部介助">一部介助</option>
                <option value="全介助">全介助</option>
            </select>
        </div>

        <div class="form-group">
            <label for="更衣">更衣</label>
            <select name="更衣" class="form-control">
                <option>{{ $adl->更衣 }}</option>
                <option value="自立">自立</option>
                <option value="要見守り">要見守り</option>
                <option value="一部介助">一部介助</option>
                <option value="全介助">全介助</option>
            </select>
        </div>

        <div class="form-group">
            <label for="備考">備考</label>
            <textarea name="備考" class="form-control" placeholder="{{ $adl->備考 }}">{{ $adl->備考 }}</textarea>
        </div>

</div>
<div class="container text-center">
    <a href="{{ route('admin.residents.index')}}" class="btn btn-outline-secondary col-md-2"><i
            class="fa fa-fast-backward"></i> 入居者一覧に戻る</a>
    <button type="submit" class="btn btn-primary col-md-4 ml-2">完了</button>
</div>
</form>
@endforeach

@endsection
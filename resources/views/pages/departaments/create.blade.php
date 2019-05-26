@extends('layout')

@section('content')
    <div class="container">
        <h2>Создание отдела</h2>
        @include('pages.errors')
        {{Form::open([
            'route' => 'departaments.store',
        ])}}
    <div class="box-body">
        <div class="col-md-6">
            <div class="form-group">
                <label for="exampleInputEmail1">Название</label>
                <input type="text" class="form-control" id="" name="title" value="{{old('title')}}" placeholder="">
            </div>
        </div>
    </div>
    <div class="box-footer">
        <button class="btn btn-success pull-right">Сохранить</button>
    </div>
        {{Form::close()}}
    </div>
@endsection
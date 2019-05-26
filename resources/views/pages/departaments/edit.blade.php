@extends('layout')

@section('content')
    <div class="container">
        <h2>Редактирование отдела</h2>
        {{Form::open([
            'route' => ['departaments.update', $departament->id],
            'method'=>'put',
        ])}}
        <div class="box-body">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Название</label>
                    <input type="text" class="form-control" name="title" value="{{$departament->title}}" placeholder="">
                </div>
            </div>
        </div>
        <div class="box-footer">
            <button class="btn btn-success pull-right">Сохранить</button>
        </div>
        {{Form::close()}}
    </div>
@endsection
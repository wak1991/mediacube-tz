@extends('layout')

@section('content')
    <div class="container">
        <h2>Создание сотрудника</h2>
        @include('pages.errors')
        {{Form::open([
            'route' => 'employees.store',
        ])}}
    <div class="box-body">
        <div class="col-md-6">
            <div class="form-group">
                <label for="exampleInputEmail1">Имя</label>
                <input type="text" class="form-control" id="" name="name" value="{{old('name')}}" placeholder="">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Фамилия</label>
                <input type="text" class="form-control" id="" name="surname" value="{{old('surname')}}" placeholder="">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Отчество</label>
                <input type="text" class="form-control" id="" name="patronymic" value="{{old('patronymic')}}" placeholder="">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Пол</label>
                <input type="text" class="form-control" id="" name="gender" value="{{old('gender')}}" placeholder="">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Зарплата</label>
                <input type="text" class="form-control" id="" name="salary" value="{{old('salary')}}" placeholder="">
            </div>
            <div class="form-group">
                <label>Отделы</label>
                {{Form::select('departaments[]',
                $departaments,
                null,
                ['multiple' => 'multiple'])
                }}
            </div>
        </div>
    </div>
    <div class="box-footer">
        <button class="btn btn-success pull-right">Сохранить</button>
    </div>
        {{Form::close()}}
    </div>
@endsection
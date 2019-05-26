@extends('layout')

@section('content')
    <div class="container">
        <h2>Редактирование сотрудника</h2>
        {{Form::open([
            'route' => ['employees.update', $employee->id],
            'method'=>'put',
        ])}}
        <div class="box-body">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Имя</label>
                    <input type="text" class="form-control" name="name" value="{{$employee->name}}" placeholder="">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Фамилия</label>
                    <input type="text" class="form-control" name="surname" value="{{$employee->surname}}" placeholder="">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Отчество</label>
                    <input type="text" class="form-control" name="patronymic" value="{{$employee->patronymic}}" placeholder="">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Пол</label>
                    <input type="text" class="form-control" name="gender" value="{{$employee->gender}}" placeholder="">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Зарплата</label>
                    <input type="text" class="form-control" name="salary" value="{{$employee->salary}}" placeholder="">
                </div>
                <div class="form-group">
                    <label>Отделы</label>
                    {{Form::select('departaments[]',
                    $departaments,
                    $selectedDepartaments,
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
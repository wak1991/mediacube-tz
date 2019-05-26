@extends('layout')

@section('content')
    <section class="main-content">

        <div class="container">
            <h1>Сотрудники</h1>
            <div class="form-group col-sm-4">
                <a href="{{route('employees.create')}}" class="btn btn-danger">Добавить</a>
            </div>
            <div class="row">
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Имя</th>
                        <th>Фамилия</th>
                        <th>Отчество</th>
                        <th>Пол</th>
                        <th>Заработная плата</th>
                        <th>Название отделов</th>
                        <th>Действие</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($employees as $employee)
                    <tr>
                        <td>{{$employee->name}}</td>
                        <td>{{$employee->surname}}</td>
                        <td>{{$employee->patronymic}}</td>
                        <td>{{$employee->gender}}</td>
                        <td>{{$employee->salary}}</td>
                        <td>{{$employee->getDepartamentsTitles()}}</td>
                        <td>

                            <a href="{{route('employees.edit', $employee->id)}}" class="oi oi-pencil"></a>

                            {{Form::open(['route'=>['employees.destroy', $employee->id], 'method'=>'delete'])}}
                            <button onclick="return confirm('Вы уверены?')" type="submit" class="delete">
                                <i class="oi oi-trash"></i>
                            </button>
                            {{Form::close()}}

                        </td>
                    </tr>
                    @endforeach
                    </tfoot>
                </table>
            </div>
        </div>

    </section>
@endsection
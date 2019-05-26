@extends('layout')

@section('content')
    <section class="main-content">

        <div class="container">
            <h1>Отделы</h1>
            <div class="form-group col-sm-4">
                <a href="{{route('departaments.create')}}" class="btn btn-primary">Добавить</a>
            </div>
            <div class="row">
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Название отдела</th>
                        <th>Количество сотрудников отдела</th>
                        <th>Максимальная заработная плата среди сотрудников отдела</th>
                        <th>Действие</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($departaments as $departament)
                        <tr>
                            <td>{{$departament->title}}</td>
                            <td>{{$departament->getEmployeesCount()}}</td>
                            <td>{{$departament->getEmployeesMaxSalary()}}</td>
                            <td>

                                <a href="{{route('departaments.edit', $departament->id)}}" class="oi oi-pencil"></a>

                                {{Form::open(['route'=>['departaments.destroy', $departament->id], 'method'=>'delete'])}}
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
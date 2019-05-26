@extends('layout')

@section('content')
    <section class="main-content">

        <div class="container">
            <h1>Сетка</h1>
            <div class="row">
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th></th>
                        @foreach($departaments as $departament)
                        <th>{{$departament->title}}</th>
                        @endforeach
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($employees as $employee)
                        <tr>
                            <td>{{$employee->name . ' ' . $employee->surname}}</td>
                        </tr>
                    @endforeach
                    </tfoot>
                </table>
            </div>
        </div>
    </section>
@endsection
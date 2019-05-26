<?php

namespace App\Http\Controllers;

use App\Departament;
use App\Employee;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        return view ('pages.employees.index', compact('employees'));
    }

    public function create()
    {
        $departaments = Departament::pluck('title', 'id')->all();
        return view('pages.employees.create', compact('departaments'));
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'surname' => 'required',
            'surname' => 'required',
            'departaments' => 'required',
            'salary' => 'numeric',
        ]);

        $employee = Employee::add($request->all());
        $employee->setDepartaments($request->get('departaments'));
        return redirect()->route('employees.index')->with('status', 'Сотрудник добавлен');
    }


    public function edit($id)
    {
        $employee = Employee::find($id);
        $departaments = Departament::pluck('title', 'id')->all();
        $selectedDepartaments = $employee->departaments->pluck('id')->all();
        return view('pages.employees.edit', compact('employee', 'departaments', 'selectedDepartaments'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'surname' => 'required',
            'surname' => 'required',
            'salary' => 'numeric',
        ]);

        $employee = Employee::find($id);
        $employee->edit($request->all());
        $employee->setDepartaments($request->get('departaments'));

        return redirect()->route('employees.index')->with('status', 'Сотрудник обновлён');
    }


    public function destroy($id)
    {
        Employee::find($id)->delete();
        return redirect()->route('employees.index')->with('status', 'Сотрудник удалён');
    }
}

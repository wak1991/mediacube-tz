<?php

namespace App\Http\Controllers;

use App\Departament;
use Illuminate\Http\Request;

class DepartamentsController extends Controller
{
    public function index()
    {
        $departaments = Departament::all();
        return view('pages.departaments.index', compact('departaments'));
    }

    public function create()
    {
        return view('pages.departaments.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required'
        ]);
        Departament::create($request->all());
        return redirect()->route('departaments.index')->with('status', 'Отдел добавлен');
    }


    public function edit($id)
    {
        $departament = Departament::find($id);
        return view('pages.departaments.edit', compact('departament'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required'
        ]);
        $departament = Departament::find($id);
        $departament->update($request->all());
        return redirect()->route('departaments.index')->with('status', 'Отдел обновлён');
    }


    public function destroy($id)
    {
        $departament = Departament::find($id);
        if ($departament->getEmployeesCount() == "Нет сотрудников")
        {
            $departament->delete();
            return redirect()->route('departaments.index')->with('status', 'Отдел удалён');
        }
        return redirect()->route('departaments.index')->with('status', 'Отдел не может быть удалён. В него входят сотрудники');
    }
}

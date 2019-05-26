<?php

namespace App\Http\Controllers;

use App\Departament;
use App\Employee;

class HomeController extends Controller
{

    public function index()
    {
        $departaments = Departament::all();
        $employees = Employee::all();
        $all = Employee::with('departaments', 'departaments.employees')->get();
        return view('pages.index', compact('departaments', 'employees', 'all'));
    }

}

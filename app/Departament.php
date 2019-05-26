<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departament extends Model
{
    protected $fillable = ['title'];

    public function employees()
    {
        return $this->belongsToMany(
            Employee::class,
            'departaments_emloyees',
            'departament_id',
            'emloyee_id'
        );
    }

    public function getEmployeesCount()
    {
        return (!$this->employees->isEmpty())
            ? count($this->employees->pluck('title')->all())
            : 'Нет сотрудников';
    }

    public function getEmployeesMaxSalary()
    {
        return (!$this->employees->isEmpty())
            ? max($this->employees->pluck('salary')->all())
            : 'Нет зарплат';
    }

}

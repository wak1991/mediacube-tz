<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = ['name', 'surname', 'patronymic', 'gender', 'salary'];

    public function departaments()
    {
        return $this->belongsToMany(
            Departament::class,
            'departaments_emloyees',
            'emloyee_id',
            'departament_id'
        );
    }

    public function setDepartaments($ids)
    {
        if ($ids == null){return;}
        $this->departaments()->sync($ids);
    }

    public static function add($fields)
    {
        $emploee = new static;
        $emploee->fill($fields);
        $emploee->save();

        return $emploee;
    }

    public function edit($fields)
    {
        $this->fill($fields);
        $this->save();
    }

    public function getDepartamentsTitles()
    {
        return (!$this->departaments->isEmpty())
            ? implode(', ', $this->departaments->pluck('title')->all())
            : 'Нет отделов';
    }

    public function getHome()
    {
        return (!$this->departaments->isEmpty())
            ? ($this->departaments->pluck('title')->all())
            : 'Нет отделов';
    }

}

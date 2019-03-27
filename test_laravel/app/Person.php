<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    // Validar
    public static $messages = [
        'first_name.required' => 'Es necesario ingresar nombre.',
        'last_name.required' => 'Es necesario ingresar apellido.'
    ];
    public static $rules = [
        'first_name' => 'required|min:3',
        'last_name' => 'required|min:3'
    ];

    protected $fillable = ['first_name','last_name','birthday'];

    // Employee
    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
}

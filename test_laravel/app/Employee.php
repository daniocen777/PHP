<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    // Validar
    public static $messages = [
        'person_id.required' => 'Es necesario ingresar nombre del empleado.',
        'salary.required' => 'Es necesario ingresar salario.'
    ];
    public static $rules = [
        'person_id' => 'required',
        'salary' => 'required'
    ];

    protected $fillable = ['person_id', 'salary'];

    // person
    public function category()
    {
        return $this->belongsTo(Person::class);
    }
}

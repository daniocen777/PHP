<?php

namespace miBiblioteca;

use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    // Referencia a la tabla "autor"
    protected $table = 'autor';
    // Referencia a su llave primaria
    protected $primaryKey = 'idautor';
    // No queremos las fechas de creación o modificación
    public $timestamps = false;
    // Campos
    protected $fillable = [
        'nombre',
        'descripcion',
        'imagen'
    ];

    protected $guarded = [
    ];
}

<?php

namespace miBiblioteca;

use Illuminate\Database\Eloquent\Model;

class Obra extends Model
{
    // Referencia a la tabla "obra"
    protected $table = 'obra';
    // Referencia a su llave primaria
    protected $primaryKey = 'idobra';
    // No queremos las fechas de creación o modificación
    public $timestamps = false;
    // Campos	
    protected $fillable = [
        'idautor',
        'nombreObra',
        'fechaPublicacion',
        'isbn',
        'imagen'
    ];

    protected $guarded = [
    ];
}

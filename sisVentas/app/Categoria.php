<?php

namespace sisVentas;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    // Hace referencia a la tabla "categoria"
    protected $table = 'categoria';
    // Atributos clave primaria
    protected $primaryKey = "idcategoria";
    // Sentencia para saber cuándo fue creado el registro, en este caso no lo queremos 
    public $timestamps = false;
    // Campos 
    protected $fillable = [
    	'nombre',
    	'descripcion',
    	'condicion'
    ];
    // Cuando no queremos que no se asigne al modelo
    protected $guarded = [
    ];
}

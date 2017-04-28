<?php

namespace sisVentas;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    // Hace referencia a la tabla "persona"
    protected $table = 'persona';
    protected $primaryKey = "idpersona";
    // Sentencia para saber cuándo fue creado el registro, en este caso no lo queremos 
    public $timestamps = false;
    // Campos 
    protected $fillable = [
    	'tipo_persona',
    	'nombre',
    	'tipo_documento',
    	'num_documento',
    	'direccion',
    	'telefono',
    	'email'
    ];
    // Cuando no queremos que no se asigne al modelo
    protected $guarded = [
    ];
}

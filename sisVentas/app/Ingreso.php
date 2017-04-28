<?php

namespace sisVentas;

use Illuminate\Database\Eloquent\Model;

class Ingreso extends Model
{
     // Hace referencia a la tabla "categoria"
    protected $table = 'ingreso';
    // Atributos clave primaria
    protected $primaryKey = "idingreso";
    // Sentencia para saber cuándo fue creado el registro, en este caso no lo queremos 
    public $timestamps = false;
    // Campos 
    protected $fillable = [
    	'idproveedor',
    	'tipo_comprobante',
    	'serie_comprobante',
    	'num_comprobante',
    	'fecha_hora',
    	'impuesto',
    	'estado'
    ];
    // Cuando no queremos que no se asigne al modelo
    protected $guarded = [
    ];
}

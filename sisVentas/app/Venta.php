<?php

namespace sisVentas;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
     // Hace referencia a la tabla "venta"
    protected $table = 'venta';
    // Atributos clave primaria
    protected $primaryKey = "idventa";
    // Sentencia para saber cuándo fue creado el registro, en este caso no lo queremos 
    public $timestamps = false;
    // Campos 
    protected $fillable = [
    	'idcliente',
    	'tipo_comprobante',
    	'serie_comprobante',
    	'num_comprobante',
    	'fecha_hora',
    	'impuesto',
    	'total_venta',
    	'estado'
    ];
    // Cuando no queremos que no se asigne al modelo
    protected $guarded = [
    ];
}

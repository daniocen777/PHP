<?php

namespace sisVentas;

use Illuminate\Database\Eloquent\Model;

class DetalleIngreso extends Model
{
     // Hace referencia a la tabla "categoria"
    protected $table = 'detalle_ingreso';
    // Atributos clave primaria
    protected $primaryKey = "iddetalle_ingreso";
    // Sentencia para saber cuándo fue creado el registro, en este caso no lo queremos 
    public $timestamps = false;
    // Campos 
    protected $fillable = [
    	'idingreso',
    	'idarticulo',
    	'cantidad',
    	'precio_compra',
    	'precio_venta'
    ];
    // Cuando no queremos que no se asigne al modelo
    protected $guarded = [
    ];
}

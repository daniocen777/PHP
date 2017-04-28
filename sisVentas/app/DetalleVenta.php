<?php

namespace sisVentas;

use Illuminate\Database\Eloquent\Model;

class DetalleVenta extends Model
{
      // Hace referencia a la tabla "detalle_venta"
    protected $table = 'detalle_venta';
    // Atributos clave primaria
    protected $primaryKey = "iddetalle_venta";
    // Sentencia para saber cuándo fue creado el registro, en este caso no lo queremos 
    public $timestamps = false;
    // Campos 
    protected $fillable = [
    	'idventa',
    	'idarticulo',
    	'cantidad',
    	'precio_venta',
    	'descuento',
    	'estado'
    ];
    // Cuando no queremos que no se asigne al modelo
    protected $guarded = [
    ];
}

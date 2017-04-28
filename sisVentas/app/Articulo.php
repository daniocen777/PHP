<?php

namespace sisVentas;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    // Hace referencia a la tabla "articulo"
    protected $table = 'articulo';
    // Atributos clave primaria
    protected $primaryKey = "idarticulo";
    // Sentencia para saber cuándo fue creado el registro, en este caso no lo queremos 
    public $timestamps = false;
    // Campos 
    protected $fillable = [
    	'idcategoria',
    	'codigo',
    	'nombre',
    	'stock',
    	'descripcion',
    	'imagen',
    	'estado'
    ];
    // Cuando no queremos que no se asigne al modelo
    protected $guarded = [
    ];
}

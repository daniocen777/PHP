<?php

namespace sisVentas\Http\Controllers;

use Illuminate\Http\Request;
// Agregar el Request
use sisVentas\Http\Requests;
// Agregar el modelo
use sisVentas\Venta;
use sisVentas\DetalleVenta;
// Para hacer redirecciones
use Illuminate\Support\Facades\Redirect;
// Para subir las imágenes
use Illuminate\Support\Facades\input;
// Para hacer referecnia al CategoriaFormrequest
use sisVentas\Http\Requests\VentaFormRequest;
use DB;
// Fehca y hora
use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection;

class VentaController extends Controller
{
   public function __construct()
    {
        $this->middleware('auth');
    }
    // Crear las clases para el index, show, destroy, etc
    // Index
    public function index(Request $request)
    {
    	// Si existe el objeto request
    	if ($request)
    	{
    		$query = trim($request->get('searchText'));
    		$ventas = DB::table('venta as v')
    		->join('persona as p', 'v.idcliente', '=', 'p.idpersona')
    		->join('detalle_venta as dv', 'v.idventa', '=', 'dv.idventa')
    		->select('v.idventa', 'v.fecha_hora', 'p.nombre', 'v.tipo_comprobante', 'v.serie_comprobante', 'v.num_comprobante', 'v.impuesto', 'v.estado', 'v.total_venta')
    		->where('v.num_comprobante', 'LIKE', '%'.$query.'%')
    		->orderBy('v.idventa', 'desc')
    		->groupBy('v.idventa', 'v.fecha_hora', 'p.nombre', 'v.tipo_comprobante', 'v.serie_comprobante', 'v.num_comprobante', 'v.impuesto', 'v.estado')
    		->paginate(7);

    		return view('ventas.venta.index', ["ventas"=>$ventas, "searchText"=>$query]);
    	}
    }

    public function create()
    {
    	// Lista de personas
    	$personas = DB::table('persona')->where('tipo_persona', '=', 'Cliente')->get();
    	// Lista de artículo
    	// Se debe unir la tabla "articulo" con "detalle_ingreso", para saber el precio_venta de ese artículo. Luego, calcular su precio promedio ('avg(di.precio_venta)')
    	// Como tenemos una columna calculada (precio_promedio), se realiza un groupBy
    	$articulos = DB::table('articulo as art')
    				 ->join('detalle_ingreso as di', 'art.idarticulo', '=', 'di.idarticulo')
    				 ->select(DB::raw('CONCAT(art.codigo, " ", art.nombre) AS articulo'), 'art.idarticulo', 'art.stock', DB::raw('avg(di.precio_venta) as precio_promedio'))
    				 ->where('art.estado', '=', 'Activo')
    				 ->where('art.stock', '>', '0')
    				 ->groupBy('articulo', 'art.idarticulo', 'art.stock')
    				 ->get();
    	return view('ventas.venta.create', ["personas"=>$personas, "articulos"=>$articulos]);
    }

    public function store(VentaFormRequest $request)
    {
    	try {
    		// Inicio de una transacción, ya que se tiene que almacenar primero el Ingreso y luego su DetalleIngreso
    		// 1 Para el Ingreso
    		DB::beginTransaction();
    		$venta = new Venta();
    		$venta->idcliente = $request->get('idcliente');
    		$venta->tipo_comprobante = $request->get('tipo_comprobante');
    		$venta->serie_comprobante = $request->get('serie_comprobante');
    		$venta->num_comprobante = $request->get('num_comprobante');
    		// total_venta será enviada desde un input con un js
    		$venta->total_venta = $request->get('total_venta');
    		// Fecha
    		$mytime = Carbon::now('America/Lima');
    		$venta->fecha_hora = $mytime->toDateTimeString();
    		$venta->impuesto = '18';
    		$venta->estado = 'A';
    		$venta->save();

    		// 2 Para el DetalleIngreso
    		$idarticulo = $request->get('idarticulo');
    		$cantidad = $request->get('cantidad');
    		// Descuento será un input de tipo array
    		$descuento = $request->get('descuento');
    		$precio_venta = $request->get('precio_venta');
    		// Este es un arrelgo para el detalle
    		$cont = 0;
    		while ($cont < count($idarticulo)) {
    			$detalle = new DetalleVenta();
    			$detalle->idventa = $venta->idventa;
    			$detalle->idarticulo = $idarticulo[$cont];
    			$detalle->cantidad = $cantidad[$cont];
    			$detalle->descuento = $descuento[$cont];
    			$detalle->precio_venta = $precio_venta[$cont];
    			$detalle->save();
    			$cont = $cont + 1;
    		}
    		// Finaliza la transacción
    		DB::commit();
    	} catch (\Exception $e) {
    		// Captura la transacción, anularla
    		DB::rollback();
    	}
    	return Redirect::to('ventas/venta');
    }

    public function show($id)
    {
    	// Solo un registro
    	$venta = DB::table('venta as v')
    			->join('persona as p', 'v.idcliente', '=', 'p.idpersona')
    			->join('detalle_venta as dv', 'v.idventa', '=', 'dv.idventa')
    			->select('v.idventa', 'v.fecha_hora', 'p.nombre', 'v.tipo_comprobante', 'v.serie_comprobante', 'v.num_comprobante', 'v.impuesto', 'v.estado', 'v.total_venta')
    			->where('v.idventa', '=', $id)
    			->first();

    	$detalles = DB::table('detalle_venta as d')
    				->join('articulo as a', 'd.idarticulo', '=', 'a.idarticulo')
    				->select('a.nombre as articulo', 'd.cantidad', 'd.descuento', 'd.precio_venta')
    				->where('d.idventa', '=', $id)
    				->get();
    	// Devolver dichos parámetros
    	return view("ventas.venta.show", ["venta" => $venta, "detalles" => $detalles]);
    }

    // Cancelar el ingreso
    public function destroy($id)
    {
    	$venta = Venta::findOrFail($id);
    	$venta->estado = 'C';
    	$venta->update();
    	return Redirect::to('ventas/venta');
    }
}

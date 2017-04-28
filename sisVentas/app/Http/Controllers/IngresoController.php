<?php

namespace sisVentas\Http\Controllers;

use Illuminate\Http\Request;
// Agregar el Request
use sisVentas\Http\Requests;
// Agregar los modelos
use sisVentas\Ingreso;
use sisVentas\DetalleIngreso;
use Illuminate\Support\Facades\input;
// Para hacer redirecciones
use Illuminate\Support\Facades\Redirect;
// Para hacer referecnia al CategoriaFormrequest
use sisVentas\Http\Requests\IngresoFormRequest;
use DB;
// Fehca y hora
use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection;

class IngresoController extends Controller
{
      // Constructor 
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
    		$ingresos = DB::table('ingreso as i')->join('persona as p', 'i.idproveedor', '=', 'p.idpersona')->join('detalle_ingreso as di', 'i.idingreso', '=', 'di.idingreso')->select('i.idingreso', 'i.fecha_hora', 'p.nombre', 'i.tipo_comprobante', 'i.serie_comprobante', 'i.num_comprobante', 'i.impuesto', 'i.estado', DB::raw('sum(di.cantidad*precio_compra) as total'))->where('i.num_comprobante', 'LIKE', '%'.$query.'%')->orderBy('i.idingreso', 'desc')->groupBy('i.idingreso', 'i.fecha_hora', 'p.nombre', 'i.tipo_comprobante', 'i.serie_comprobante', 'i.num_comprobante', 'i.impuesto', 'i.estado')->paginate(7);

    		return view('compras.ingreso.index', ["ingresos"=>$ingresos, "searchText"=>$query]);
    	}
    }

    public function create()
    {
    	// Lista de personas
    	$personas = DB::table('persona')->where('tipo_persona', '=', 'Proveedor')->get();
    	// Lista de artículo
    	$articulos = DB::table('articulo as art')
    				 ->select(DB::raw('CONCAT(art.codigo, " ", art.nombre) AS articulo'), 'art.idarticulo')
    				 ->where('art.estado', '=', 'Activo')
    				 ->get();
    	return view('compras.ingreso.create', ["personas"=>$personas, "articulos"=>$articulos]);
    }

    public function store(IngresoFormRequest $request)
    {
    	try {
    		// Inicio de una transacción, ya que se tiene que almacenar primero el Ingreso y luego su DetalleIngreso
    		// 1 Para el Ingreso
    		DB::beginTransaction();
    		$ingreso = new Ingreso;
    		$ingreso->idproveedor = $request->get('idproveedor');
    		$ingreso->tipo_comprobante = $request->get('tipo_comprobante');
    		$ingreso->serie_comprobante = $request->get('serie_comprobante');
    		$ingreso->num_comprobante = $request->get('num_comprobante');
    		$mytime = Carbon::now('America/Lima');
    		$ingreso->fecha_hora = $mytime->toDateTimeString();
    		$ingreso->impuesto = '18';
    		$ingreso->estado = 'A';
    		$ingreso->save();

    		// 2 Para el DetalleIngreso
    		$idarticulo = $request->get('idarticulo');
    		$cantidad = $request->get('cantidad');
    		$precio_compra = $request->get('precio_compra');
    		$precio_venta = $request->get('precio_venta');
    		// Este es un arrelgo para el detalle
    		$cont = 0;
    		while ($cont < count($idarticulo)) {
    			$detalle = new DetalleIngreso();
    			$detalle->idingreso = $ingreso->idingreso;
    			$detalle->idarticulo = $idarticulo[$cont];
    			$detalle->cantidad = $cantidad[$cont];
    			$detalle->precio_compra = $precio_compra[$cont];
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
    	return Redirect::to('compras/ingreso');
    }

    public function show($id)
    {
    	// Solo un registro
    	$ingreso = DB::table('ingreso as i')->join('persona as p', 'i.idproveedor', '=', 'p.idpersona')->join('detalle_ingreso as di', 'i.idingreso', '=', 'di.idingreso')->select('i.idingreso', 'i.fecha_hora', 'p.nombre', 'i.tipo_comprobante', 'i.serie_comprobante', 'i.num_comprobante', 'i.impuesto', 'i.estado', DB::raw('sum(di.cantidad*precio_compra) as total'))->where('i.idingreso', '=', $id)->groupBy('i.idingreso','i.fecha_hora','p.nombre','i.tipo_comprobante','i.serie_comprobante', 'i.num_comprobante','i.impuesto','i.estado')->first();

    	$detalles = DB::table('detalle_ingreso as d')->join('articulo as a', 'd.idarticulo', '=', 'a.idarticulo')->select('a.nombre as articulo', 'd.cantidad', 'd.precio_compra', 'd.precio_venta')->where('d.idingreso', '=', $id)->get();
    	// Devolver dichos parámetros
    	return view("compras.ingreso.show", ["ingreso" => $ingreso, "detalles" => $detalles]);
    }

    // Cancelar el ingreso
    public function destroy($id)
    {
    	$ingreso = Ingreso::findOrFail($id);
    	$ingreso->estado = 'C';
    	$ingreso->update();
    	return Redirect::to('compras/ingreso');
    }
}

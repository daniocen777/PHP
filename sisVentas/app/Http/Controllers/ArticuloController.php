<?php

namespace sisVentas\Http\Controllers;

use Illuminate\Http\Request;
// Agregar el Request
use sisVentas\Http\Requests;
// Agregar el modelo
use sisVentas\Articulo;
// Para hacer redirecciones
use Illuminate\Support\Facades\Redirect;
// Para subir las imágenes
use Illuminate\Support\Facades\input;
// Para hacer referecnia al CategoriaFormrequest
use sisVentas\Http\Requests\ArticuloFormRequest;
use DB;

class ArticuloController extends Controller
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
    		// Obtener los registros de la tabla categoria
    		// Ingresar un texto para buscar las categorías
    		$query = trim($request->get('searchText'));
    		$articulos = DB::table('articulo as a')->join('categoria as c', 'a.idcategoria', '=', 'c.idcategoria')->select('a.idarticulo', 'a.nombre', 'a.codigo', 'a.stock', 'c.nombre as categoria', 'a.descripcion', 'a.imagen', 'a.estado')->where('a.nombre', 'LIKE', '%'.$query.'%')->orwhere('a.codigo', 'LIKE', '%'.$query.'%')->orderBy('idarticulo', 'desc')->paginate(7);
    		// Retorna la vista, enviando la variale $categorias
    		return view('almacen.articulo.index', ["articulos"=>$articulos, "searchText"=>$query]);
    	}
    }
    public function create()
    {
        // Enviar el listado de tosas las categorías para que aparezcan en un comboBox
        $categorias = DB::table('categoria')->where('condicion', '=', '1')->get();
        // Ir a la vista create de articulo, enviándole las categorías
    	return view('almacen.articulo.create', ['categorias' => $categorias]);
    }
    // Para almacenar
    public function store(ArticuloFormRequest $request)
    {
    	// Almacena el objeto articulo en la tabla "articulo"
    	$articulo = new Articulo;
    	// Objetos de validación
    	$articulo->idcategoria = $request->get('idcategoria');
    	$articulo->codigo = $request->get('codigo');
        $articulo->nombre = $request->get('nombre');
        $articulo->stock = $request->get('stock');
    	$articulo->descripcion = $request->get('descripcion');
        $articulo->estado = 'Activo';
        // Cargar la imagen
        if (Input::hasFile('imagen'))
        {
            // Crear un archivo
            $file = Input::file('imagen');
            $file->move(public_path().'/imagenes/articulos', $file->getClientOriginalName());
            $articulo->imagen = $file->getClientOriginalName();
        }
    	// Almacenar
    	$articulo->save();
    	// Retornar 
    	return Redirect::to('almacen/articulo');
    }
    public function show($id)
    {
         // EL $id, es del modelo "primaryKey"
    	return view("almacen.articulo.show", ["articulo"=>Articulo::findOrFail($id)]);
    }
    public function edit($id)
    {
        // EL $id, es del modelo "primaryKey"
        // Este método se encarga de redireccionar a la página para editar
        $articulo = Articulo::findOrFail($id);
         $categorias = DB::table('categoria')->where('condicion', '=', '1')->get();
    	return view("almacen.articulo.edit", ["articulo"=>$articulo, "categorias" => $categorias]);
    }
    public function update(ArticuloFormRequest $request, $id)
    {
        // Este método es para actualizar 
    	$articulo = Articulo::findOrFail($id);
    	$articulo->idcategoria = $request->get('idcategoria');
        $articulo->codigo = $request->get('codigo');
        $articulo->nombre = $request->get('nombre');
        $articulo->stock = $request->get('stock');
        $articulo->descripcion = $request->get('descripcion');
        
        // Cargar la imagen
        if (Input::hasFile('imagen'))
        {
            // Crear un archivo
            $file = Input::file('imagen');
            $file->move(public_path().'/imagenes/articulos', $file->getClientOriginalName());
            $articulo->imagen = $file->getClientOriginalName();
        }
    	$articulo->update();
    	return Redirect::to('almacen/articulo');
    }
    public function destroy($id)
    {
         // EL $id, es del modelo "primaryKey"
    	// Solo cambiar la condición 1 por 0 
    	$articulo = Articulo::findOrFail($id);
    	$articulo->estado = 'Inactivo';
        $articulo->update();
    	return Redirect::to('almacen/articulo');
    }
}

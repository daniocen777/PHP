<?php

namespace sisVentas\Http\Controllers;

use Illuminate\Http\Request;
// Agregar el Request
use sisVentas\Http\Requests;
// Agregar el modelo
use sisVentas\Categoria;
// Para hacer redirecciones
use Illuminate\Support\Facades\Redirect;
// Para hacer referecnia al CategoriaFormrequest
use sisVentas\Http\Requests\CategoriaFormRequest;
use DB;
class CategoriaController extends Controller
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
    		$categorias = DB::table('categoria')->where('nombre', 'LIKE', '%'.$query.'%')->where('condicion', '=', '1')->orderBy('idcategoria', 'desc')->paginate(7);
    		// Retorna la vista, enviando la variale $categorias
    		return view('almacen.categoria.index', ["categorias"=>$categorias, "searchText"=>$query]);
    	}
    }
    public function create()
    {
    	return view('almacen.categoria.create');
    }
    // Para almacenar
    public function store(CategoriaFormrequest $request)
    {
    	// Almacena el objeto categoria en la tabla "categoria"
    	$categoria = new Categoria;
    	// Objetos de validación
    	$categoria->nombre = $request->get('nombre');
    	$categoria->descripcion = $request->get('descripcion');
    	$categoria->condicion = '1';
    	// Almacenar
    	$categoria->save();
    	// Retornar 
    	return Redirect::to('almacen/categoria');
    }
    public function show($id)
    {
         // EL $id, es del modelo "primaryKey"
    	return view("almacen.categria.show", ["categoria"=>Categoria::findOrFail($id)]);
    }
    public function edit($id)
    {
        // EL $id, es del modelo "primaryKey"
        // Este método se encarga de redireccionar a la página para editar
    	return view("almacen.categoria.edit", ["categoria"=>Categoria::findOrFail($id)]);
    }
    public function update(CategoriaFormrequest $request, $id)
    {
        // Este método es para actualizar 
    	$categoria = Categoria::findOrFail($id);
    	$categoria->nombre = $request->get('nombre');
    	$categoria->descripcion = $request->get('descripcion');
    	$categoria->update();
    	return Redirect::to('almacen/categoria');
    }
    public function destroy($id)
    {
         // EL $id, es del modelo "primaryKey"
    	// Solo cambiar la condición 1 por 0 
    	$categoria = Categoria::findOrFail($id);
    	$categoria->condicion = '0';
        $categoria->update();
    	return Redirect::to('almacen/categoria');
    }
}

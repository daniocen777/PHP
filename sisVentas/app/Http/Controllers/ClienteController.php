<?php

namespace sisVentas\Http\Controllers;

use Illuminate\Http\Request;
// Agregar el Request
use sisVentas\Http\Requests;
// Agregar el modelo
use sisVentas\Persona;
// Para hacer redirecciones
use Illuminate\Support\Facades\Redirect;
// Para hacer referecnia al CategoriaFormrequest
use sisVentas\Http\Requests\PersonaFormRequest;
use DB;

class ClienteController extends Controller
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
    		$personas = DB::table('persona')->where('nombre', 'LIKE', '%'.$query.'%')->where('tipo_persona', '=', 'Cliente')->orwhere('num_documento', 'LIKE', '%'.$query.'%')->where('tipo_persona', '=', 'Cliente')->orderBy('idpersona', 'desc')->paginate(7);
    		// Retorna la vista, enviando la variale $personas en la carpeta "ventas/cliente"
    		return view('ventas.cliente.index', ["personas"=>$personas, "searchText"=>$query]);
    	}
    }
    public function create()
    {
    	return view('ventas.cliente.create');
    }
    // Para almacenar
    public function store(PersonaFormRequest $request)
    {
    	// Almacena el objeto categoria en la tabla "categoria"
    	$persona = new Persona;
    	// Objetos de validación
    	$persona->tipo_persona = 'Cliente';
    	$persona->nombre = $request->get('nombre');
    	$persona->tipo_documento = $request->get('tipo_documento');
    	$persona->num_documento = $request->get('num_documento');
    	$persona->direccion = $request->get('direccion');
    	$persona->telefono = $request->get('telefono');
    	$persona->email = $request->get('email');
    	// Almacenar
    	$persona->save();
    	// Retornar 
    	return Redirect::to('ventas/cliente');
    }
    public function show($id)
    {
         // EL $id, es del modelo "primaryKey"
    	return view("ventas.cliente.show", ["persona"=>Persona::findOrFail($id)]);
    }
    public function edit($id)
    {
        // EL $id, es del modelo "primaryKey"
        // Este método se encarga de redireccionar a la página para editar
    	return view("ventas.cliente.edit", ["persona"=>Persona::findOrFail($id)]);
    }
    public function update(PersonaFormRequest $request, $id)
    {
        // Este método es para actualizar 
    	$persona = Persona::findOrFail($id);
    	$persona->nombre = $request->get('nombre');
    	$persona->tipo_documento = $request->get('tipo_documento');
    	$persona->num_documento = $request->get('num_documento');
    	$persona->direccion = $request->get('direccion');
    	$persona->telefono = $request->get('telefono');
    	$persona->email = $request->get('email');

    	$persona->update();
    	return Redirect::to('ventas/cliente');
    }
    public function destroy($id)
    {
         // EL $id, es del modelo "primaryKey"
    	// Solo cambiar la condición 1 por 0 
    	$persona = Persona::findOrFail($id);
    	$persona->tipo_persona = 'Inactivo';
        $persona->update();
    	return Redirect::to('ventas/cliente');
    }
}

<?php

namespace sisVentas\Http\Controllers;

use Illuminate\Http\Request;
// Agregar el Request
use sisVentas\Http\Requests;
// Agregar el modelo
use sisVentas\User;
// Para hacer redirecciones
use Illuminate\Support\Facades\Redirect;
// Para hacer referecnia al CategoriaFormrequest
use sisVentas\Http\Requests\UsuarioFormRequest;
use DB;

class UsuarioController extends Controller
{
     // Constructor 
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Función index
    public function index(Request $request)
    {
    	if ($request)
    	{
    		$query = trim($request->get('searchText'));
    		$usuarios = DB::table('users')->where('name', 'LIKE', '%'.$query.'%')
    		->orderBy('id', 'desc')
    		->paginate(7);

    		return view('seguridad.usuario.index', ["usuarios" => $usuarios, "searchText" => $query]);
    	}
    }

    // Función create
    public function create()
    {
    	return view("seguridad.usuario.create");
    }

    // Funció store
    // Validar con el UsuarioFormRequest
    public function store(UsuarioFormRequest $request)
    {
    	$usuario = new User;
    	$usuario->name = $request->get('name');
    	$usuario->email = $request->get('email');
    	$usuario->password = bcrypt($request->get('password'));
    	$usuario->save();
    	return Redirect::to('seguridad/usuario');
    }

    // FUnción edir para enviar al usuario al formulario para que edite
    public function edit($id)
    {
    	return view("seguridad.usuario.edit", ["usuario" => User::findOrFail($id)]);
    }

    // Función para modificar
    public function update(UsuarioFormRequest $request, $id)
    {
    	$usuario = User::findOrFail($id);
    	$usuario->name = $request->get('name');
    	$usuario->email = $request->get('email');
    	$usuario->password = bcrypt($request->get('password'));
    	$usuario->update();
    	return Redirect::to('seguridad/usuario');
    }

    // Eliminar
    public function destroy($id)
    {
    	$usuarios = DB::table('users')->where('id', '=', $id)->delete();
    	return Redirect::to('seguridad/usuario');
    }
}

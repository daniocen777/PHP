<?php

namespace miBiblioteca\Http\Controllers;

use Illuminate\Http\Request;
use miBiblioteca\Http\Requests;
// Modelos
use miBiblioteca\Autor;
use miBiblioteca\Obra;
// Para hacer redirecciones
use Illuminate\Support\Facades\Redirect;
// Para subir las imágenes
use Illuminate\Support\Facades\input;
// Para hacer referecnia al CategoriaFormrequest
use miBiblioteca\Http\Requests\AutorFormRequest;
// Para enviar mensajes
use Session;
use DB;

class AutorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Página index
    public function index(Request $request)
    {
    	if ($request)
    	{
    		// Para buscar a un autor
    		$query = trim($request->get('searchText'));
    		$autores = DB::table('autor as a')
    		->join('obra as o', 'a.idautor', '=', 'o.idautor')
    		->select('a.idautor', 'a.nombre', 'a.descripcion', 'a.imagen', 'o.nombreObra', 'o.fechaPublicacion', 'o.isbn', 'o.imagen as imagenObra')
    		->where('a.nombre', 'LIKE', '%'. $query .'%')
    		->orderBy('a.idautor','desc')
    		->paginate(5);

    		return view('autor.index', ["autores" => $autores, "searchText" => $query]);
    	}
    }

    // Función que envía a la ruta para insertar un autor
    public function create()
    {
        // Traer a loas personas para mostrarlas
        $autores = DB::table('autor')->get();
    	return view('autor.create', ["autores" => $autores]);
    }

    // FUnción para insertar a un autor
    public function store(AutorFormRequest $request)
    {
    	// Transacción
    	try {
    		DB::beginTransaction();
    		$autor = new Autor();
    		$autor->nombre = $request->get('nombre');
    		$autor->descripcion = $request->get('descripcion');
    		// Imagen
    		if (Input::hasFile('imagenAutor'))
    		{
    			// Crear un archivo
           		$file = Input::file('imagenAutor');
            	$file->move(public_path().'/imagenes/autores', $file->getClientOriginalName());
            	$autor->imagen = $file->getClientOriginalName();
    		}
    		$autor->save();
    		// Obra
            $obra = new Obra();
            $obra->idautor = $autor->idautor;
            $obra->nombreObra = $request->get('nombreObra');
            $obra->fechaPublicacion = $request->get('fechaPublicacion');
            $obra->isbn = $request->get('isbn');
            if (Input::hasFile('imagenObra'))
            {
                // Crear un archivo
                $file2 = Input::file('imagenObra');
                $file2->move(public_path().'/imagenes/obras', $file2->getClientOriginalName());
                $obra->imagen = $file2->getClientOriginalName();
            }
             $obra->save();
            // Finaliza la transacción
            DB::commit();
    	} catch (Exception $e) {
    		// Captura la transacción, anularla
            DB::rollback();
    	}
        // Enviar un mesnaje
        Session::flash('message', 'Autor registrado correctamente');
        return Redirect::to('autor');
    }

    // Función para mostrar, no se hará
    public function show()
    {

    }

    // Función para ver la página para editar
    public function edit($id)
    {
        $autor = Autor::findOrFail($id);
        // La obra del autor
        $obra = Obra::findOrFail($id);
        return view("autor.edit", ["autor" => $autor, "obra" => $obra]);
    }

    // Función para actualizar 
    public function update(AutorFormRequest $request, $id)
    {
        // Encontrar el autor a editar
        $autor = Autor::findOrFail($id);
        $autor->nombre = $request->get('nombre');
        $autor->descripcion = $request->get('descripcion');
            // Imagen
            if (Input::hasFile('imagenAutor'))
            {
                // Crear un archivo
                $file = Input::file('imagenAutor');
                $file->move(public_path().'/imagenes/autores', $file->getClientOriginalName());
                $autor->imagen = $file->getClientOriginalName();
            }
        $autor->update();
        // Encontrar la obra del autor
        $obra = Obra::findOrFail($id);
        $obra->nombreObra = $request->get('nombreObra');
        $obra->fechaPublicacion = $request->get('fechaPublicacion');
        $obra->isbn = $request->get('isbn');
            if (Input::hasFile('imagenObra'))
            {
                // Crear un archivo
                $file2 = Input::file('imagenObra');
                $file2->move(public_path().'/imagenes/obras', $file2->getClientOriginalName());
                $obra->imagen = $file2->getClientOriginalName();
            }
        $obra->update();
        Session::flash('message', 'Autor editado correctamente');
        return Redirect::to('autor');
    }

    // Función para eliminar 
    public function destroy($id)
    {
        $obra = DB::table('obra')->where('idobra', '=', $id)->delete();
        $autor = DB::table('autor')->where('idautor', '=', $id)->delete();
        Session::flash('message', "Autor eliminado de la base de datos");
        return Redirect::to('autor');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Person;
use DataTables;
use Validator;
use Response;

class PersonController extends Controller
{
    //
    public function index() {
        return view('admin.person.index');
    }
    
    public function getData() {
        $people = Person::select('id', 'first_name', 'last_name', 'birthday');
        return DataTables::of($people)
        ->addColumn('action', function($person) {
            return '<a href="#" class="btn btn-warning btn-fab btn-fab-mini btn-round edit"' .
            'id="'.$person->id.'"><i class="material-icons">edit</i></a>';
        })
        ->addColumn('radio', '<div class="form-check form-check-radio">
                                    <label class="form-check-label">
                                        <input class="form-check-input person_radio" type="radio" name="person_radio" value="value="{{ $id }}" >
                                        <span class="circle">
                                            <span class="check"></span>
                                        </span>
                                    </label>
                                </div>')
        ->addColumn('checkbox', '<div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" name="person_checkbox[]" 
                                            class="form-check-input person_checkbox" value="{{ $id }}">
                                        <span class="form-check-sign">
                                            <span class="check"></span>
                                        </span>
                                    </label>
                                </div>')
        ->rawColumns(['radio', 'checkbox', 'action'])
        ->make(true);
    }

    // store
    public function store(Request $request) {
        $validation = Validator::make($request->all(), Person::$rules, Person::$messages);

        $error_array = array(); // guarda errores  
        $success_output = ''; // message ok

        if ($validation->fails()) {
            foreach ($validation->messages()->getMessages() as $field_name => $messages) {
                $error_array[] = $messages;
            }
        } else {
            if ($request->get('button_action') == "insert") {
                Person::create($request->all());
                $success_output = '<div class="alert alert-success alert-dismissable" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                Datos agregados correctamente</div>';
            }
            if ($request->get('button_action') == "update") 
            {
                $person = Person::find($request->get('person_id'));
                $person->first_name = $request->get('first_name');
                $person->last_name = $request->get('last_name');
                $person->birthday = $request->get('birthday');
                $person->save();
                $success_output = '<div class="alert alert-warning alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                Datos actualizados correctamente</div>';
            }
        }
        $output = array(
            'error' => $error_array,
            'success' => $success_output
        );
        return response::json($output);
    }

    // Delete
    // public function removeData(Request $request) 
    // {
    //     $person = Person::find($request->input('id'));
    //     if ($person->delete())
    //     {
    //         $success_output = '<div class="alert alert-danger alert-dismissable">
    //             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    //             Dato eliminado correctamente</div>';
    //     } else {
    //         alert("NO SE DELETE");
    //     }

    //     $output = array(
    //         'success' => $success_output
    //     );

    //     return response::json($output);
    // }

    // Cnnseguir datos para la edición
    public function fetchData(Request $request)
    {
        $id = $request->input('id');
        $person = Person::find($id);

        $output = array(
            'first_name' => $person->first_name,
            'last_name' => $person->last_name,
            'birthday' => $person->birthday
        );

        return response::json($output);
    }

    // Delete massive
    public function removeMassive(Request $request) {
        $Person_id_array = $request->input('id');
        $Person = Person::whereIn('id', $Person_id_array);
        if ($Person->delete()) {
            $success_output = '<div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                Registros eliminados correctamente</div>';
        }
        $output = array(
            'success' => $success_output
        );

        return response::json($output);
    }
    
}

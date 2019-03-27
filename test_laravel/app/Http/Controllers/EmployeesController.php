<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Person;
use App\Employee;
use Validator;
use DataTables;
use Response;
use DB;

class EmployeesController extends Controller
{
    // index
    public function index()
    {
        // DataTables
        return view('admin.employees.index');
    }

    // GetData con DataTables
    public function getData()
    {
       $employees = DB::table('employees')->join('people', 'employees.person_id', '=', 'people.id')
                    ->select(['employees.person_id', 'people.first_name',
                              'people.last_name', 'employees.id', 'employees.salary']);

        return DataTables::of($employees)
        ->addColumn('action_edit', function($employee) {
            return '<a href="#" class="btn btn-warning btn-fab btn-fab-mini btn-round edit"' .
            'id="'.$employee->id.'"><i class="material-icons">edit</i></a>';
        })
        ->addColumn('action_delete', function($employee) {
            return '<a href="#" class="btn btn-danger btn-fab btn-fab-mini btn-round delete"' .
            'id="'.$employee->id.'"><i class="material-icons">delete</i></a>';
        })
        ->rawColumns(['action_edit', 'action_delete'])
        ->make(true);
    }

    // llenar combo de personas
    public function peopleCbo() {
        $people = Person::all();
        return $people;
    }

    // Guardar y editar
    public function storeUpdate(Request $request) {
        $validation = Validator::make($request->all(), Employee::$rules, Employee::$messages);

        $error_array = array(); 
        $success_output = '';

        if ($validation->fails())
        {
            foreach($validation->messages()->getMessages() as $field_name => $messages)
            {
                $error_array[] = $messages;
            }
        }
        else 
        {
            if ($request->get('button_action') == "insert")
            {
                Employee::create($request->all());

                $success_output = '<div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                Datos agregados correctamente</div>';
            }
            // if ($request->get('button_action') == "update") 
            // {
            //     $asset = Asset::find($request->get('asset_id'));
            //     $asset->asset_name = $request->get('asset_name');
            //     $asset->category_id = $request->get('category_id');
            //     $asset->save();
            //     $success_output = '<div class="alert alert-warning alert-dismissable">
            //     <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            //     Datos actualizados correctamente</div>';
            // }

        }

        $output = array(
            'error' => $error_array,
            'success' => $success_output
        );

        return response::json($output);
    }

    // Delete
    public function removeData(Request $request) 
    {
        $employee = Employee::find($request->input('id'));
        $variable = $employee->delete();

        if ($variable == true)
        {
            $success_output = '<div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                Dato eliminado correctamente</div>';
        }

        $output = array(
            'success' => $success_output
        );

        return response::json($output);
    }
}

@extends('layouts.app')

@section('body-class', 'profile-page sidebar-collapse')

@section('css')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  
@stop

@section('content')

<div class="page-header header-filter" data-parallax="true"
     style="background-image: url('{{ asset('img/bg3.jpg') }}')">
    
</div>

<div class="main main-raised">
    <div class="container">
        <div class="section text-center" >
            <span id="form_success"></span>
            <button class="btn btn-primary btn-round" id="add_data" data-toggle="modal">
                <i class="material-icons">add</i> Agregar
            </button>
            <h2>LISTADO DE EMPLEADOS</h2>
            <table id="employee_table" width="100%" class="table table-hover display">
                <thead>
                    <tr>
                        <th class="text-center">First Name</th>
                        <th class="text-center">Last Name</th>
                        <th class="text-center" width="150px">Salary</th>
                        <th class="text-center" width="100px">Edit</th>
                        <th class="text-center" width="100px">Delete</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>

<!-- Form to insert and update -->
<div id="employee_modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" id="employee_form">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card card-nav-tabs">
                        <div class="card-header card-header-primary text-center">
                            <h3 id="title_h3">Nuevo</h3>
                        </div>
                        <div class="card-body">
                            <span id="form_output"></span>
                            @csrf
                            <div class="form-group">
                                <label for="personCbo">Empleado</label>
                                <select class="form-control" id="personCbo" name="personCbo" selected></select>
                                <span class="bmd-help">Coloque el nombre del empleado.</span>
                            </div>
                            <div class="form-group">
                                <label for="salary">Salario</label>
                                <input type="number" class="form-control" id="salary" name="salary" step="0.01">
                                <span class="bmd-help">Coloque el sueldo del empleado.</span>
                            </div>
                        </div>
                        <div class="card-footer text-muted" style="margin-left:100px;">
                            <input type="submit" name="submit" id="action" value="Agregar" class="btn btn-primary btn-round" />
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <input type="hidden" name="button_action" id="button_action" value="insert"/>
                            <input type="hidden" name="employee_id" id="employee_id" value=""/>
                            <input type="hidden" name="person_id" id="person_id" value=""/>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END - Form to insert -->

<!-- Form to delete -->
<div id="employee_delete_modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" id="employee_delete_form">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card card-nav-tabs">
                        <div class="card-header card-header-primary text-center">
                            <h3 id="title_delete_h3"></h3>
                        </div>
                        <div class="card-body">
                            <span id="form_output"></span>
                            @csrf
                            <div class="col-sm-12 text-center">
                                <div class="form-group label-floating">
                                    <h5>¿Desea eliminar este dato?</h5>
                                </div> 
                            </div>
                        </div>
                        <div class="card-footer text-muted" style="margin-left:100px;">
                            <input type="submit" value="Eliminar" class="btn btn-primary btn-round" />
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END - Form to delete -->

@stop

@section('scripts')

  

  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>

  <!-- <script src="{{ asset('js/morris-data.js') }}" type="text/javascript"></script>-->

    
<script src="{{ asset('js/employee.js') }}" type="text/javascript"></script>   

    <script>
        $(document).ready(function() {
            $('#employee_table').DataTable();
        });
    </script> 
@stop
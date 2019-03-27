@extends('layouts.app')

@section('body-class', 'profile-page sidebar-collapse')

@section('css')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  
@stop

@section('content')

<div class="page-header header-filter" data-parallax="true"
     style="background-image: url('{{ asset('img/profile_city.jpg') }}')">
    
</div>

<div class="main main-raised">
    <div class="container">
        <div class="section text-center" >
            <span id="form_success"></span>
            <button class="btn btn-primary btn-round" id="add_data" data-toggle="modal">
                <i class="material-icons">person_add</i> Agregar
            </button>
            <h2>LISTADO DE PERSONAS</h2>
            <table id="person_table" width="100%" class="table table-hover display">
                <thead>
                    <tr>
                        <th class="text-center" width="50px">IDs</th>
                        <th class="text-center">First Name</th>
                        <th class="text-center">Last Name</th>
                        <th class="text-center" width="150px">Birthday</th>
                        <th class="text-center" width="100px">Action</th>
                        <th class="text-center" width="40px">
                            <button type="button" name="edit_pers" id="edit_pers"
                                    class="btn btn-warning btn-fab btn-fab-mini btn-round edit"><i class="material-icons">edit</i>
                            </button>
                        </th>
                        <th class="text-center" width="40px">
                            <button type="button" name="bulk_delete" id="bulk_delete"
                                    class="btn btn-danger btn-fab btn-fab-mini btn-round delete"><i class="material-icons">delete</i>
                            </button>
                        </th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>

<!-- Form to insert and update -->
<div id="person_modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" id="person_form">
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
                                <label for="first_name">Nombre</label>
                                <input type="text" class="form-control" id="first_name" name="first_name">
                                <span class="bmd-help">Coloque el nombre de la persona.</span>
                            </div>
                            <div class="form-group">
                                <label for="last_name">Apellido</label>
                                <input type="text" class="form-control" id="last_name" name="last_name">
                                <span class="bmd-help">Coloque el nombre el apellido persona.</span>
                            </div>
                            <div class="form-group">
                                <label for="birthday">Fecha de nacimiento</label>
                                <input type="text" class="form-control datetimepicker" id="birthday" name="birthday"/>
                                <span class="bmd-help">Coloque ela fecha de nacimiento de la persona.</span>
                            </div>
                        </div>
                        <div class="card-footer text-muted" style="margin-left:100px;">
                            <input type="submit" name="submit" id="action" value="Agregar" class="btn btn-primary btn-round" />
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <input type="hidden" name="button_action" id="button_action" value="insert"/>
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
<div id="person_delete_modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" id="person_delete_form">
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

    
  <script src="{{ asset('js/person.js') }}" type="text/javascript"></script>  

    <script>
        $(document).ready(function() {
            $('#person_table').DataTable();
        });

        $('.datetimepicker').datetimepicker({
            icons: {
                time: "fa fa-clock-o",
                date: "fa fa-calendar",
                up: "fa fa-chevron-up",
                down: "fa fa-chevron-down",
                previous: 'fa fa-chevron-left',
                next: 'fa fa-chevron-right',
                today: 'fa fa-screenshot',
                clear: 'fa fa-trash',
                close: 'fa fa-remove'
            }
        });
    </script> 
@stop
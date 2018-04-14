<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link href="web/jq/jquery-ui.min.css" rel="stylesheet" type="text/css"/>
        <link href="web/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="web/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="web/css/styles.css" rel="stylesheet" type="text/css"/>

        <script src="web/jq/jquery-3.2.1.min.js" type="text/javascript"></script>
        <script src="web/jq/jquery-ui.min.js" type="text/javascript"></script>
        <script src="web/js/bootstrap.min.js" type="text/javascript"></script>

        <script src="web/js/autores.js" type="text/javascript"></script>
    </head>
    <body>
        <?php include './web/template/menu.php'; ?>


        <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
            <div class="row">
                <ol class="breadcrumb">
                    <li><a href="#">
                            <em class="fa fa-home"></em>
                        </a></li>
                    <li class="active">Dashboard</li>
                </ol>
            </div><!--/.row-->

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">LISTA DE AUTORES</h1>
                </div>
            </div><!--/.row-->

            <div class="row"> 
                <div class="col-lg-12">
                    <div class="contenedor-modal">
                        <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modalIns">
                            <em class="fa fa-plus"></em>  AGREGAR
                        </button>
                    </div>
                </div>
            </div>
            <br>

            <div class="row">
                <div class="form-group">
                    <div>
                        <div class="col-lg-10" id="ins_ok"></div>
                    </div>
                </div>
            </div>

            <!-- INICIO - Lista de autores-->
            <div class="panel panel-container">
                <table id="tabl" class="table table-hover table table-bordered table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>AUTOR</th>
                            <th style="text-align: center">
                                <a href="#" title="Actualizar registro" onclick="autoresGet();">
                                    <span class="glyphicon glyphicon-pencil"></span> 
                                </a>
                            </th>
                            <th style="text-align: center">
                                <a href="#" title="Eliminar registro" onclick="autoresDelValidator();">
                                    <span class="glyphicon glyphicon-remove"></span> 
                                </a>
                            </th>
                        </tr>
                    </thead>
                    <tbody id="autoresQry">
                    </tbody>
                </table>
            </div>
            <!-- FIN - Lista de autores-->

            <!-- INICIO - Insertar  -->
            <div class="modal fade" id="modalIns" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color: #428BCA;" >
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 align="center" class="modal-title" style="color: #ffffff" id="myModalLabel">NUEVO REGISTRO</h4>
                        </div>
                        <div class="modal-body">
                            <form class="form-horizontal" role="form">
                                <div class="form-group">
                                    <label for="autor_ins" class="col-lg-2 control-label">Autor</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" id="autor_ins"
                                               placeholder="Nombre del autor">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-offset-7 col-lg-5">
                                        <button type="button" class="btn btn-primary" onclick="autoresIns();">Enviar datos</button>
                                        <button type="button" class="btn btn-danger" onclick="modalClose();">Cancelar</button>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-offset-1 col-lg-11">
                                        <div class="col-lg-10" id="ins_error"></div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- FIN - Insertar  -->

            <!-- INICIO - Elimniar-->
            <!-- Pregunta si desea Elimniar-->
            <div class="modal fade" id="autorModalDel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color: #428BCA;" >
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 align="center" class="modal-title" style="color: #ffffff" id="myModalLabel">ELIMINAR REGISTRO</h4>
                        </div>
                        <div class="modal-body">
                            <form class="form-horizontal" role="form">
                                <h3 align="center">¿Desea eliminar?</h3>
                                <div class="form-group">
                                    <div class="col-lg-offset-5 col-lg-7">
                                        <button type="button" class="btn btn-primary" onclick="autoresDel();">Sí</button>
                                        <button type="button" class="btn btn-danger" onclick="modalClose();">No</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Pregunta si desea Elimniar-->
            <!-- Mensaje cuando no se selecciona un objeto a eliminar-->
            <div class="modal fade" id="autorModalDelFail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color: #FCF8E3;" >
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 align="center" class="modal-title" style="color: #C09853" id="myModalLabel">ADVERTENCIA</h4>
                        </div>
                        <div class="modal-body">
                            <form class="form-horizontal" role="form">
                                <h3 align="center">Debe seleccionar alguna fila para eliminar</h3>
                                <div class="form-group">
                                    <div class="col-lg-offset-5 col-lg-7">
                                        <button type="button" class="btn btn-danger" onclick="modalClose();">Cerrar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Mensaje cuando no se selecciona un objeto a eliminar-->
            <!-- FIN - Eliminar-->

            <!-- INICIO - Actualizar -->
            <div class="modal fade" id="modalUpd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color: #428BCA;" >
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 align="center" class="modal-title" style="color: #ffffff" id="myModalLabel">ACTUALIZAR REGISTRO</h4>
                        </div>
                        <div class="modal-body">
                            <form class="form-horizontal" role="form">
                                <input type="hidden" id="idautor_upd"/>
                                <div class="form-group">
                                    <label for="autor_upd" class="col-lg-2 control-label">Autor</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" id="autor_upd">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-offset-7 col-lg-5">
                                        <button type="button" class="btn btn-primary" onclick="autoresUpd();">Enviar datos</button>
                                        <button type="button" class="btn btn-danger" onclick="modalClose();">Cancelar</button>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-offset-1 col-lg-11">
                                        <div class="col-lg-10" id="upd_error"></div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Mensaje si no se ha elegido un registro para actualizar-->
            <div class="modal fade" id="autorModalUpdFail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color: #FCF8E3;" >
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 align="center" class="modal-title" style="color: #C09853" id="myModalLabel">ADVERTENCIA</h4>
                        </div>
                        <div class="modal-body">
                            <form class="form-horizontal" role="form">
                                <h3 align="center">Debe seleccionar alguna fila para actualizar</h3>
                                <div class="form-group">
                                    <div class="col-lg-offset-5 col-lg-7">
                                        <button type="button" class="btn btn-danger" onclick="modalClose();">Cerrar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Mensaje si no se ha elegido un registro para actualizar-->
            <!-- FIN - Actualizar -->
        </div>
    </body>
</html>
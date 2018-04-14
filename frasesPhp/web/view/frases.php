<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../jq/jquery-ui.min.css" rel="stylesheet" type="text/css"/>
        <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../../web/css/styles.css" rel="stylesheet" type="text/css"/>
        <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css"/>

        <script src="../jq/jquery-3.2.1.min.js" type="text/javascript"></script>
        <script src="../jq/jquery-ui.min.js" type="text/javascript"></script>
        <script src="../js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../js/frases.js" type="text/javascript"></script>

    </head>
    <body>
        <?php include '../../web/template/menu.php'; ?>


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
                    <h1 class="page-header">LISTA DE FRASES</h1>
                </div>
            </div><!--/.row-->

            <div class="row"> 
                <div class="col-lg-12">
                    <div class="contenedor-modal">
                        <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modalFrasesIns">
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
                            <th>FRASES</th>
                            <th style="text-align: center">
                                <a href="#" title="Actualizar registro" onclick="">
                                    <span class="glyphicon glyphicon-pencil"></span> 
                                </a>
                            </th>
                            <th style="text-align: center">
                                <a href="#" title="Eliminar registro" onclick="">
                                    <span class="glyphicon glyphicon-remove"></span> 
                                </a>
                            </th>
                        </tr>
                    </thead>
                    <tbody id="frasesQry">
                    </tbody>
                </table>
            </div>
            <!-- FIN - Lista de autores-->

            <!-- INICIO - Insertar  -->
            <div class="modal fade" id="modalFrasesIns" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color: #428BCA;" >
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 align="center" class="modal-title" style="color: #ffffff" id="myModalLabel">NUEVO REGISTRO</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="form-group">
                                    <div>
                                        <div class="col-lg-10" id="msg_error"></div>
                                    </div>
                                </div>
                            </div>
                            <form class="form-horizontal" role="form">
                                <div class="form-group">
                                    <label for="autorCbo" class="col-lg-2 control-label">Autor</label>
                                    <div class="col-lg-10">
                                        <select class="form-control" id="autorCbo" style="width: 290px"></select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="frase_ins" class="col-lg-2 control-label">Frase</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" id="frase_ins"
                                               placeholder="Ingrese frase">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-offset-7 col-lg-5">
                                        <button type="button" class="btn btn-primary" onclick="frasesIns();">Enviar datos</button>
                                        <button type="button" class="btn btn-danger" onclick="">Cancelar</button>
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

        </div>
    </body>
</html>
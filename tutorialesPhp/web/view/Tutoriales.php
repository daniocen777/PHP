<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../parainfo/form.css" rel="stylesheet" type="text/css"/>
        <link href="../parainfo/message.css" rel="stylesheet" type="text/css"/>

        <script src="../parainfo/form.js" type="text/javascript"></script>
        <script src="../parainfo/message.js" type="text/javascript"></script>
    </head>
    <body>
        <?php include '../plantilla/menu.php'; ?>
        <!--        <div class="container">
                    <button class="btn btn-primary" type="button" onclick="tutorialesIns();"
                            data-toggle="modal" data-target="#miModal">
                        <span class="glyphicon glyphicon-plus"></span> Agregar
                    </button>
                </div>-->
        <div class="container">
            <a href="TutorialesIns.php" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Agregar</a>
        </div>
        <br>

        <div class="form-group">
            <div class="col-lg-offset-2 col-lg-10">
                <div class="col-lg-10" id="del_ok"></div>
            </div>
        </div>

        <div class="form-group">
            <div class="col-lg-offset-2 col-lg-10">
                <div class="col-lg-10" id="upd_ok"></div>
            </div>
        </div>


        <div class="container">
            <table id="tabl" class="table table-hover table table-bordered table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Título</th>
                        <th>Tipo</th>
                        <th>Precio</th>
                        <th>
                            <a href="#" title="Actualizar registro" onclick="tutorialesUpd();">
                                <span class="glyphicon glyphicon-pencil"></span> 
                            </a>
                        </th>
                        <th>
                            <a href="#" title="Eliminar registro" onclick="tutorialesDel();">
                                <span class="glyphicon glyphicon-remove"></span> 
                            </a>
                        </th>
                    </tr>
                </thead>
                <tbody id="tutorialesQry"></tbody>

            </table>
        </div>

        <div class="form-group">
            <div class="col-lg-offset-1 col-lg-11">
                <div class="col-lg-10" id="msg_error"></div>
            </div>
        </div>

        <div style="display: none">
            <div id="dlg_message"><p id="message"></p></div>
        </div>

        <!-- Formulario para insertat-->

        <!--        <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title" id="exampleModalLongTitle">Nuevo Registro</h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form class="parainfo form-horizontal" role="form">
                                <div class="form-group">
                                    <label for="titulo" class="col-lg-2 control-label">Título</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" id="titulo">
                                    </div>
                                </div>
        
                                <div class="form-group">
                                    <label for="tipo" class="col-lg-2 control-label">Tipo</label>
                                    <div class="col-lg-10">
                                        <select class="form-control" id="tipo">
                                            <option value="Video">Video</option>
                                            <option value="Separata">Separata</option>
                                        </select>
                                    </div>
                                </div>
        
                                <div class="form-group">
                                    <label for="precio" class="col-lg-2 control-label">Precio</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" id="precio">
                                    </div>
                                </div>
        
                                <div class="form-group">
                                    <div class="col-lg-offset-5 col-lg-7">
                                        <button type="button" class="btn btn-success" onclick="tutorialesIns();">
                                            <span class="glyphicon glyphicon-floppy-saved"></span> Enviar datos
                                        </button>
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
                </div>-->
        <div style="display: none">
            <div id="dupd" title="Actualizar registro">
                <form class="parainfo">
                    <input type="hidden" id="idtutorial_upd"/>
                    <div class="form-group">
                        <label for="titulo" class="col-lg-3 control-label">Título</label>
                        <div class="col-lg-7">
                            <input type="text" class="form-control" id="titulo_upd">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="tipo" class="col-lg-3 control-label">Tipo</label>
                        <div class="col-lg-7">
                            <select class="form-control" id="tipo_upd">
                                <option value="Video">Video</option>
                                <option value="Separata">Separata</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="precio" class="col-lg-3 control-label">Precio</label>
                        <div class="col-lg-7">
                            <input type="text" class="form-control" id="precio_upd">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-offset-1 col-lg-11">
                            <div class="col-lg-10" id="ins_error"></div>
                        </div>
                    </div>
                </form>
                <div id="upd_error" 
                     class="msg_error ui-state-error ui-corner-all"></div>
            </div>
        </div>

    </body>
</html>
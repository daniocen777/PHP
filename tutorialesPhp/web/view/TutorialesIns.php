<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

    </head>
    <body>
        <?php include '../plantilla/menu.php'; ?>


        <!-- Formulario para insertat-->

        <form class="parainfo form-horizontal" role="form">
            <div class="form-group">
                <div class="col-lg-offset-2 col-lg-10">
                    <div class="col-lg-10" id="ins_ok"></div>
                </div>
            </div>
            <div class="form-group">
                <label for="titulo" class="col-lg-3 control-label">Título</label>
                <div class="col-lg-7">
                    <input type="text" class="form-control" id="titulo">
                </div>
            </div>

            <div class="form-group">
                <label for="tipo" class="col-lg-3 control-label">Tipo</label>
                <div class="col-lg-7">
                    <select class="form-control" id="tipo">
                        <option value="Video">Video</option>
                        <option value="Separata">Separata</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="precio" class="col-lg-3 control-label">Precio</label>
                <div class="col-lg-7">
                    <input type="text" class="form-control" id="precio">
                </div>
            </div>

            <div class="form-group">
                <div class="col-lg-offset-5 col-lg-7">
                    <button type="button" class="btn btn-primary" onclick="tutorialesIns();">
                        <span class="glyphicon glyphicon-floppy-saved"></span> Enviar datos
                    </button>
                    <a class="btn btn-success" href="Tutoriales.php">Regresar a lista</a>
                </div>
            </div>

            <div class="form-group">
                <div class="col-lg-offset-1 col-lg-11">
                    <div class="col-lg-10" id="ins_error"></div>
                </div>
            </div>

        </form>


    </body>
</html>
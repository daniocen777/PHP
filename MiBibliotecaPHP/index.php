<!DOCTYPE html>
<html>
<head>
	<title>Mi Biblioteca</title>
	<meta charset="utf-8">
	<!-- Agregar estilos bootstrap-->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/jquery-ui.min.css">
	<script src="js/validaciones.js"></script>
</head>
<body>
<br>
	<div class="container">
		<ul class="nav nav-pills">
	 		<li class="active"><button class="btn btn-primary" data-toggle="modal" data-target="#miventana">NUEVO REGISTRO</button></li>
	  		<li><a href="vista/Lista_AutorObra.php">VER AUTORES</a></li>
	 		<li><a href="">DESCARGAS</a></li>
		</ul>
		
	</div>

	<div class="modal fade" id="miventana" tabindex="-1" rol="dialog" aria-labellebdy="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<!-- Cuerpo de la ventana modal-->
				<!-- CABECERA-->
				<div class="modal-header">
					<!-- &times; -> es una X para cerrar-->
					<!-- data-dismiss="modal" -> para cerrar el diálogo -->
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 align="center">REGISTRAR</h4>
				</div>
				<!-- CONTENEDOR-->
				<div class="modal-body">
					<form role="form" method="POST" action="control/Control_Insertar.php" enctype="multipart/form-data">
						<div class="row">
				  			<div class="col-md-12">
				  				<div class="form-group">
									<h1>DATOS DEL AUTOR  <span class="glyphicon glyphicon-user" aria-hidden="true"></span></h1>
								</div>
				  			</div>
						</div>

						<div class="row">
				  			<div class="col-md-2"><label for="nombre" control-label">Nombre</label>
				  			</div>
				 			<div class="col-md-10"><input type="text" name="nombre" class="form-control" placeholder="Coloque nombre del autor" id="nombre" onkeyup="ValidarCampos()" required />
				 			</div>
				 			<div class="col-lg-12" id="MensajeNombre"></div>
						</div>

						<div class="row">
				  			<div class="col-md-2"><label for="descripcion" control-label">Descripción</label></div>
				 			<div class="col-md-10"><textarea class="form-control" rows="3" name="descripcion" id="descripcion" placeholder="Descripción sobre el autor"></textarea></div>
				 			<div class="col-lg-12" id="MensajeDesc"></div>
						</div>


						<div class="row">
				  			<div class="col-md-2"><label for="fotoAutor" control-label">Foto del autor</label></div>
				 			<div class="col-md-10"><input type="file" name="fotoAutor" class="form-control" placeholder="URL" id="fotoAutor" /></div>
						</div>

						<div class="col-md-12">
				  			<div class="form-group">
								<h1>DATOS DE LA OBRA  <span class="glyphicon glyphicon-book" aria-hidden="true"></span></h1>
							</div>
				  		</div>

						<div class="row">
				  			<div class="col-md-2"><label for="obra" control-label">Obra</label></div>
				 			 <div class="col-md-10"><input type="text" name="obra" class="form-control" placeholder="Coloque nombre del libro" id="obra" onkeyup="ValidarCampos()" required/></div>
				 			 <div class="col-lg-12" id="MensajeObra" ></div>
						</div>

						<div class="row">
				  			<div class="col-md-2"><label for="año" control-label">Año</label></div>
				 			 <div class="col-md-10"><input type="text" name="ano" class="form-control" placeholder="Año de publicación" id="ano"/>	</div>
						</div>

						<div class="row">
				  			<div class="col-md-2"><label for="isbn" control-label">ISBN</label></div>
				 			 <div class="col-md-10"><input type="text" name="isbn" class="form-control" placeholder="Año de publicación" id="isbn" required /></div>
						</div>

						<div class="row">
				  			<div class="col-md-2"><label for="fotoObra" control-label">Foto de la obra</label></div>
				 			<div class="col-md-10"><input type="file" name="fotoObra" class="form-control" placeholder="URL" id="fotoObra" /></div>
						</div>
						<div class="row">
				  			<div class="col-md-12" align="right">
								<button type="submit" class="btn btn-block btn-primary" id="guardar">Guardar  <span class="glyphicon glyphicon-floppy-save" aria-hidden="true"></span>
								</button>
							</div>
				  		</div>

					</form>
				</div>
				<!-- PIE DE PÁGINA O FOOTER-->
				<div class="modal-footer">
					<button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		var resultado = document.getElementById("MensajeNombre");
		var mensajeObra = document.getElementById("MensajeObra");
		
		function ValidarCampos()
		{
			var xmlHttp;
			if(window.XMLHttpRequest)
			{
				xmlHttp = new XMLHttpRequest();
			}
			else
			{
				xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
			var nombre = document.getElementById('nombre').value;

			//var ano = document.getElementById('ano').value;
			//var isbn = document.getElementById('isbn').value;
			var respuestaNombre = ValidaNombre(nombre);
			
			if(respuestaNombre == "poco") 
			{
				resultado.innerHTML="<i class='fa fa-close'></i> <div class='alert alert-danger'><i class='fa fa-close'></i>Nombre mayor de 4 caracteres <input id='usernamechecker' type='hidden' value='0' name='usernamechecker'></div> ";
  				document.getElementById("guardar").disabled = true;
			}
			else if (respuestaNombre == "invalido") 
			{
				resultado.innerHTML="<i class='fa fa-close'></i> <div class='alert alert-danger'><i class='fa fa-close'></i>Nombre inválido (sin caracteres numéricos)<input id='usernamechecker' type='hidden' value='0' name='usernamechecker'></div> ";
  				document.getElementById("guardar").disabled = true;
			}
			else
			{
				resultado.innerHTML="<div class='alert alert-success'><i class='fa fa-close'></i>Nombre aceptado<input id='usernamechecker' type='hidden' value='0' name='usernamechecker'></div> ";

				var obra = document.getElementById('obra').value;
				var respuestaObra = ValidaObra(obra);
				if (respuestaObra == "invalido") 
				{
					mensajeObra.innerHTML="<i class='fa fa-close'></i> <div class='alert alert-danger'><i class='fa fa-close'></i>Obra inválido (sin caracteres numéricos)<input id='usernamechecker' type='hidden' value='0' name='usernamechecker'></div> ";
  					document.getElementById("guardar").disabled = true;
				}
				else if(respuestaObra == "")
				{
					mensajeObra.innerHTML="<i class='fa fa-close'></i> <div class='alert alert-danger'><i class='fa fa-close'></i>Colque nombre de la obra<input id='usernamechecker' type='hidden' value='0' name='usernamechecker'></div> ";
  					document.getElementById("guardar").disabled = true;
				}
				else
				{
					mensajeObra.innerHTML="<div class='alert alert-success'><i class='fa fa-close'></i>Nombre aceptado<input id='usernamechecker' type='hidden' value='0' name='usernamechecker'></div> ";
					document.getElementById("guardar").disabled = false;
				}
			}
		}
	</script>

	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>	
	<script src="js/jquery-ui.min.js"></script>
</body>
</html>
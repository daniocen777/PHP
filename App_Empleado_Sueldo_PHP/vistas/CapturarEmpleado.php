<?php 
	require_once '../dao/EmpleadoDao.php';
	$empleadoDao = new EmpleadoDao();
	$registro = $empleadoDao->CapturarEmpleado($_GET["id"]);
 ?>


<!DOCTYPE html>
<html>
<head>
	<title>Formulario #1</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximun-scale=1.0, minimun-scale=1.0">
	<!-- Agregar estilos bootstrap-->
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/jquery-ui.min.css">
	
</head>

<body>


<!-- Los contenedores sirven para centrar la página -->
<div class="container">
	<form class="form-horizontal" role="form" method="POST" action="../control/C_Editar.php">

	<div class="form-group">
		<h1>DATOS PERSONALES  <span class="glyphicon glyphicon-user" aria-hidden="true"></span></h1>
	</div>

		<div class="form-group">
		<!--Vemos que los componentes input, textarea tienen aplicada la clase .form-control, esto es para que utilicen esta clase que crea Bootstrap por defecto y se expandan al 100% de su contenedor-->
			<label for="nombre" class="col-lg-3 control-label">Nombre</label>
			<div class="col-lg-9">
				<input type="text" name="nombre" class="form-control" value="<?php echo $registro[0]["nombre"];?>" required />	
			</div>
		</div>

		<div class="form-group">
			<label for="apPaterno" class="col-lg-3 control-label">Ap. Paterno</label>
			<div class="col-lg-9">
				<input type="text" name="apPaterno" class="form-control" value="<?php echo $registro[0]["apPaterno"];?>" required/>	
			</div>
		</div>

		<div class="form-group">
			<label for="apPaterno" class="col-lg-3 control-label">Ap. Materno</label>
			<div class="col-lg-9">
				<input type="text" name="apMaterno" class="form-control" value="<?php echo $registro[0]["apMaterno"];?>" required/>	
			</div>
		</div>

		<div class="form-group">
			<label for="fechaNac" class="col-lg-3 control-label">Fecha de Nacimiento</label>
			<div class="col-lg-9">
				<input type="text" id="datepicker" name="fechaNacimiento" value="<?php echo $registro[0]["fechaNacimiento"];?>" required/>	
			</div>
		</div>

		<div class="form-group">
			<h1>DATOS COMPLEMENTARIOS <span class="glyphicon glyphicon-check" aria-hidden="true"></span></h1>
		</div>

		<div class="form-group">
			<label for="cbxArea" class="col-lg-3 control-label">Área</label>
			<div class="col-lg-9">
				<select class="form-control" id="cbxArea" name="cbxArea">
				<option value="MARKETING">MARKETING</option>
				<option value="PLANIFICACION">PLANIFICACION</option>
				<option value="VENTAS">VENTAS</option>
				</select>	
			</div>
		</div>

		<div class="form-group">
				<label for="cbxCondicion" class="col-lg-3 control-label">Condición</label>
				<div class="col-lg-9">
					<select class="form-control" id="cbxCondicion" name="cbxCondicion">
					<option value="ESTABLE">ESTABLE</option>
					<option value="CONTRATADO">CONTRATADO</option>
				</select>	
				</div>
		</div>

		<div class="form-group">
			<label for="txtSueldo" class="col-lg-3 control-label">Sueldo</label>
			<div class="col-lg-9">
				 <div class="input-group">
				  	<span class="input-group-addon">S/</span>
				  	<input type="text" class="form-control" name="txtSueldo" id="txtSueldo" value="<?php echo $registro[0]["sueldoBase"];?>" required/>
				 </div>
			</div>
		</div>

		<div class="form-group">
			<label for="txtHijos" class="col-lg-3 control-label">Cantidad de hijos</label>
			<div class="col-lg-9">
				<input type="number" class="form-control" name="txtHijos" id="txtHijos" value="<?php echo $registro[0]["hijos"];?>" min="0" max="10" required/>
			</div>
		</div>

		<div class="form-group">
			<label for="txtTiempo" class="col-lg-3 control-label">Años de servicio</label>
			<div class="col-lg-9">
				<input type="number" class="form-control" name="txtTiempo" id="txtTiempo " value="<?php echo $registro[0]["tiempoServicio"];?>" min="0" max="10" required/>
			</div>
		</div>

		
		<div class="form-group" class="col-lg-12">
			<button class="btn btn-primary">Editar  <span class="glyphicon glyphicon-edit"></span></button>
			<a href="Lista_Empleados.php" class="btn btn-info" role="button">Lista de empleados <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span></a>
		</div>

		  <input type="hidden" name="id" value="<?PHP echo $_GET["id"]; ?>"/>

	</form>
</div>



	<!-- Agregar jquery, previamente crear otro archivo, descargado de la página jquery -->
	<script src="../js/jquery.js"></script>
	<!-- También agregar el boostrap.js-->
	<script src="../js/bootstrap.min.js"></script>	

  	<script src="../js/jquery-ui.min.js"></script>

  	<script src="../js/datepicker-es.js"></script>

	<script>
  		$( function() {
    		$( "#datepicker" ).datepicker({
        		changeMonth:true,
        		changeYear:true,
    		});
  		} );
  	</script>
</body>
</html>
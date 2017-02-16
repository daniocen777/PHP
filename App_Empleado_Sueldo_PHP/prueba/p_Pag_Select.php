<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximun-scale=1.0, minimun-scale=1.0">
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/jquery-ui.min.css">
	
</head>
<body>
<div class="container">
	<form class="form-horizntal" rol="form" method="POST" action="Control_Select.php">
	<div class="form-group">
			<label for="option" class="col-lg-3 control-label">Área</label>
			<div class="col-lg-9">
				<select class="form-control" id="option" name="option">
				<option value="ti">TI</option>
				<option value="rrhh">RR.HH</option>
				<option value="contabilidad">Contabilidad</option>
				</select>	
			</div>

			<div class="form-group">
			<label for="fechaNac" class="col-lg-3 control-label">Fecha de Nacimiento</label>
			<div class="col-lg-9">
				<input type="text" id="datepicker" name="fechaNacimiento"/>	
			</div>
		</div>

			<button class="btn btn-primary" name="boton">Ejecutar</button>
		</div>



</form>
</div>



	
<script src="../js/jquery.js"></script>
	<!-- También agregar el boostrap.js-->
	<script src="../js/bootstrap.min.js"></script>	
	<script src="../js/jquery-ui.min.js"></script>

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
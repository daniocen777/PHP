<?php 
	require_once '../dao/EmpleadoDao.php';
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Empleados</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximun-scale=1.0, minimun-scale=1.0">
	<!-- Agregar estilos bootstrap-->
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<script type="text/javascript" language="javasript" src="../js/Funciones.js"></script>
</head>
<body>
	<div class="container">
		

		<div class="table-responsive">
			<table class="table table-striped table table-hover table table-condensed">
				<tr class="success">
						<td align="center"><strong>Id</strong></td>
						<td align="center"><strong>Nombre</strong></td>
						<td align="center"><strong>Ap. Paterno</strong></td>
						<td align="center"><strong>Ap. Materno</strong></td>
						<td align="center"><strong>Fecha nacimiento</strong></td>
						<td align="center"><strong>Área</strong></td>
						<td align="center"><strong>Condición</strong></td>
						<td align="center"><strong>Sueldo base</strong></td>
						<td align="center"><strong>Cantidad de hijo</strong></td>
						<td align="center"><strong>Tiempo de servicio</strong></td>
						<td align="center"><strong>Costo de movilidad</strong></td>
						<td align="center"><strong>Descuento AFP</strong></td>
						<td align="center"><strong>Sueldo final</strong></td>
						<td align="center"><strong>Editar</strong></td>
						<td align="center"><strong>Eliminar</strong></td>
					</tr>
					<tr>
						<?php 
							$empleadoDao = new EmpleadoDao();
							$registro = $empleadoDao->ListarEmpleado();
							for ($i = 0; $i < sizeof($registro); $i++) {
						 ?>
						 <td align="center">
						 	<?php echo $registro[$i]["idEmpleado"];?>
						 </td>
						 <td align="center">
						 	<?php echo $registro[$i]["nombre"];?>
						 </td>
						  <td align="center">
						 	<?php echo $registro[$i]["apPaterno"];?>
						 </td>
						 <td align="center">
						 	<?php echo $registro[$i]["apMaterno"];?>
						 </td>
						 <td align="center">
						 	<?php echo $registro[$i]["fechaNacimiento"];?>
						 </td>
						 <td align="center">
						 	<?php echo $registro[$i]["nombreArea"];?>
						 </td>
						 <td align="center">
						 	<?php echo $registro[$i]["nombreCondicion"];?>
						 </td>
						 <td align="center">
						 	<?php echo $registro[$i]["sueldoBase"];?>
						 </td>
						 <td align="center">
						 	<?php echo $registro[$i]["hijos"];?>
						 </td>
						 <td align="center">
						 	<?php echo $registro[$i]["tiempoServicio"];?>
						 </td>
						 <td align="center">
						 	<?php echo $registro[$i]["movilidad"];?>
						 </td>
						 <td align="center">
						 	<?php echo $registro[$i]["descuentoAFP"];?>
						 </td>
						 <td align="center">
						 	<?php echo $registro[$i]["suedoFinal"];?>
						 </td>
						 <td align="center"><a href="javascript:void(0);" onclick="window.location='CapturarEmpleado.php?id=<?PHP echo $registro[$i]["idEmpleado"];?>'"><span class="glyphicon glyphicon-edit"></span></a> 
						 </td>

						 <td align="center"><a href="javascript:void(0);" onclick="Eliminar('../control/C_Eliminar.php?id=<?PHP echo $registro[$i]["idEmpleado"]; ?>')" onclick=""><span class="glyphicon glyphicon-remove"></span></a>
						 </td>
					</tr>
						<?php } ?>

			</table>
			<a href="../index.php" class="btn btn-primary btn-lg active" role="button">Enlace principal</a>
		</div>
	</div>

	<script src="js/jquery.js"></script>
	<!-- También agregar el boostrap.js-->
	<script src="js/bootstrap.min.js"></script>	

  	<script src="js/jquery-ui.min.js"></script>

  	<script src="js/datepicker-es.js"></script>
  	<script src="../js/empleados.js"></script>
</body>
</html>
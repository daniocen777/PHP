<?php 
	$nombre = strtoupper($_POST["nombre"]) ;
	$apPaterno = strtoupper($_POST["apPaterno"]);
	$apMaterno = strtoupper($_POST["apMaterno"]);
	$area = strtoupper($_POST["cbxArea"]);
	$fecha = strtoupper($_POST["fechaNacimiento"]);
	$condicion = strtoupper($_POST["cbxCondicion"]);
	$sueldo = strtoupper($_POST["txtSueldo"]);
	$hijos = strtoupper($_POST["txtHijos"]);
	$tiempo = strtoupper($_POST["txtTiempo"]);
	
	echo $nombre . "<br>";
	echo $apPaterno . "<br>";
	echo $apMaterno . "<br>";	

	if ($area == "ti") {
		echo "En TI" . "<br>";

	}
	else if ($area == "rrhh") {
		echo "Están en RR.HH" . "<br>";
	} 
	else {
		echo "Están en contabilidad" . "<br>";	
	}

	echo $fecha . "<br>";
	echo $condicion . "<br>";
	echo $sueldo . "<br>";
	echo $hijos . "<br>";
	echo $tiempo . "<br>";
	
 ?>
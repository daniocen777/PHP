<?php 
	$area = $_POST["option"];
	$fecha = $_POST["fechaNacimiento"];
	
	if ($area == "ti") {
		echo "En TI";

	}
	else {
		echo "No entra";
	}

	

	//$fecha_Mysql = str_replace('/', '-', date('d-m-Y', strtotime($fecha)));
	echo "<br>" . $fecha;
 ?>
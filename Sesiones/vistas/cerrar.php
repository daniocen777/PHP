<?php 

	session_start();
	// Cerrar todas las variables
	session_unset();
	session_destroy();
	header("Location: ../index.php");
 ?>
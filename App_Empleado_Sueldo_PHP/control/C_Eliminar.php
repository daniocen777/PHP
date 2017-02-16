<?php 
	require_once '../dao/EmpleadoDao.php';
	$empleadoDao = new EmpleadoDao();
	$empleadoDao->EliminarEmpleado($_GET["id"]);
 ?>
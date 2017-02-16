<?php 
	require_once '../modelo/m_Persona.php';
	require_once '../modelo/m_Area.php';
	require_once '../modelo/m_Condicion.php';
	require_once '../modelo/m_Empleado.php';
	require_once '../dao/EmpleadoDao.php';

	$nombre = strtoupper($_POST["nombre"]);
	$apPaterno = strtoupper($_POST["apPaterno"]);
	$apMaterno = strtoupper($_POST["apMaterno"]);
	$fechaNacimiento = strtoupper($_POST["fechaNacimiento"]);

	$area = $_POST["cbxArea"];

	$condicion = $_POST["cbxCondicion"];

	$sueldo = $_POST["txtSueldo"];
	$hijos = $_POST["txtHijos"];
	$tiempo = $_POST["txtTiempo"];

	$personaClass = new Persona($nombre, $apPaterno, $apMaterno, $fechaNacimiento);
	$areaClass = new Area($area);
	$condicionClass = new Condicion($condicion);
	$empleadoClass = new Empleado($sueldo, $tiempo, $hijos);

	$empleadoDao = new EmpleadoDao();
	$empleadoDao->InsertarEmpleado($areaClass, $condicionClass, $personaClass, $empleadoClass);
 ?>
<?php 
	require_once '../dao/EmpleadoDao.php';
	require_once '../modelo/m_Area.php';
	require_once '../modelo/m_Condicion.php';
	require_once '../modelo/m_Persona.php';
	require_once '../modelo/m_Empleado.php';

	$area = new Area();
	$condicion = new Condicion();
	$empleado = new Empleado();
	$persona = new Persona();
	$empleadoDao = new EmpleadoDao();

	$area->setNombreArea('VENTAS');

	$condicion->setNombreCondicion('CONTRATADO');

	$persona->setNombre('ANASTACIO');
	$persona->setApPaterno('KURUCHENCKO');
	$persona->setApMaterno('NAVRATILOVNA');
	$persona->setFechaNacimiento('1988-08-21');
	
	$empleado->setSueldo(2000);
	$empleado->setTiempoDeServicio(2);
	$empleado->setNumeroHijos(1);

	$empleadoDao->InsertarEmpleado($area, $condicion, $persona, $empleado);
 ?>
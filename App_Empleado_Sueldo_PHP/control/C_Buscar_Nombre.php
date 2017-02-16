<?php 
	require_once '../dao/EmpleadoDao.php';
	$boton = $_POST['boton'];
	if($boton === 'buscar')
	{
		$valor = $_POST['valor'];
		$empleadoDao = new EmpleadoDao();
		$lista = $empleadoDao->BuscarPorNombre($valor);
		echo json_encode($lista);
	}
	
 ?>
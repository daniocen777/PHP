<?php 
	require_once "../conexion/Conexion.php";

	if(Conexion::Conectar())
	{
		echo "Hay conexión  <br>";	
	}
	else
	{
		echo "Hay conexión <br>";
	}

	Conexion::Desconectar();

	if(Conexion::Desconectar())
	{
		echo "No hay conexión  <br>";	
	}
	else
	{
		echo "hay conexión";
	}

 ?>
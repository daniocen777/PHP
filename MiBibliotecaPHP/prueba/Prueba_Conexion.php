<?php 
	require_once '../dao/Conexion.php';

   		if (Conexion::Conectar() == null)
   		{
   			echo 'No conecatado';
   		}
   		else
   		{
   			echo 'Conectado';
   		}
   		Conexion::Conectar()->close();
 ?>
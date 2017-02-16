<?php 
	require_once '../dao/ConexionDao.php';

   		if (Conexion::Conectar() == null)
   		{
   			echo 'No conecatado';
   		}
   		else
   		{
   			echo 'Conectado';
   		}
   		Conexion::Conectar()->close();

   		

   		if (Conexion::Conectar()->close())
   		{
   			echo 'Te desconectaste';	
   		}
   		else
   		{
   			echo 'Sigue conectado';
   		}
 ?>
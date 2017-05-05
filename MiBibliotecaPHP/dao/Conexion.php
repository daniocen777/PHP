<?php 
	class Conexion
	{
		public static function Conectar() 
		{
        	$conexion = new mysqli("localhost", "root", "", "universidad");
        	$conexion->query("set name 'utf8'");
       	 	return $conexion;
   		}
	}
 ?>
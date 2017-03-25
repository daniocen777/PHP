<?php 
	class Conexion
	{
		public static function Conectar()
		{
			$conexion = new mysqli("localhost", "root", "", "universidad");
			$conexion->query("set nama 'utf8'");
			return $conexion;
		}

		public static function Desconectar()
		{
			Conexion::Conectar()->close();
			return true;
		}
	}
 ?>
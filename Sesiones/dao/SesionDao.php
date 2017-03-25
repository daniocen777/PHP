<?php 
	require_once "../conexion/Conexion.php";
	class SesionDao
	{
		public function ValidarUsuario($nombre, $password)
		{
			$salida1 = "";
			$query = "SELECT * FROM usuario where nombre = '$nombre' AND password = '$password'";
			$resultado = Conexion::Conectar()->query($query);
			if($variable = $resultado->fetch_assoc())
			{
				$salida1 = "Si";
			}
			else
			{
				$salida1 = "No";
			}

			Conexion::Desconectar();
			return $salida1;
		}
	}
 ?>


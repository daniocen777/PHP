<?php 
	include '../modelo/m_Persona.php';

	// $persona = new Persona();
	 // $nombre = $persona->setNombre('Lola');

	// echo 'holas ' . $persona->getNombre();
	class Clase
	{
		public function getPersonaPrueba($area, $condicion, $persona, $empleado)
		{
		echo $persona->getNombre() . " || " . $persona->getApPaterno() . " || " . $persona->getApMaterno() . " || " . $persona->getFechaNacimiento() . " || " . $area->getNombreArea() . " || " . $condicion->getNombreCondicion() . " || " . $empleado->getSueldo();
		}	
	}

	

 ?>
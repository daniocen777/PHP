<?php 
	require_once '../dao/EmpleadoDao.php';
	$empleadoDao = new EmpleadoDao();
	$registro = $empleadoDao->ListarEmpleadoPorApellido();

	$pila = array();

	for ($i = 0; $i < sizeof($registro); $i++)
	{
		$pila[$i] = $registro[$i]["apPaterno"];
	}

	$nombre = $_GET["nombre"];
	$sugerencia = "";

	if($nombre !== "")
	{
		$nombre = strtolower($nombre);
		// # de caracteres del nombre
		$cantidadCaracteres = strlen($nombre);
		// ForAech para itinerar
		foreach ($pila as $key) 
		{
			// Para saber si se repite
			$nombreEnServidor = substr($key, 0, $cantidadCaracteres);
			// Verificar si una cadena se encuentra o no dentro de una cadena
			if(stristr($nombre, $nombreEnServidor) !== false)
			{
				if($sugerencia == "")
				{
					$sugerencia = $key;
				}
				else
				{
					// Si la sugerencia ya esté mostrando algún nombre, 
					// concatenarlo con los otros
					$sugerencia .= ", $key";
				}
			}
		}
	}
	echo $sugerencia == "" ? "No fue encontrado" : $sugerencia;
 ?>
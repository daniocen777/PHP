<?php 
	//require_once '../dao/EmpleadoDao.php';
	//$empleadoDao = new EmpleadoDao();
	//$lista = $empleadoDao->ListarEmpleadoJson($_POST[]);
	//$jsonEmpleado = json_encode($lista);

	 //crear archivo json
	//$handler = fopen("empleados.json", "w+");
	//fwrite($handler, $jsonEmpleado);
	//fclose($handler);
 ?>

 <!DOCTYPE html>
	<html>
	<head>
		<title></title>
	</head>
	<body>
		<input type="text" name="nombre" onkeyup="Ajax_Get_Json(this.value)">
		
		<div id="info"></div>

		<script type="text/javascript">
		// Variable para ver la información
		var resultado = document.getElementById("info");
		function Ajax_Get_Json()
		{
			var xmlHttp;
			if(window.XMLHttpRequest)
			{
				xmlHttp = new XMLHttpRequest();
			}
			else
			{
				xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
			// Ejecutar la petición ajax
			// Función anónima
			xmlHttp.onreadystatechange = function()
			{
				// Si la petición ha sido fializada y exitosa, que muestre el documento json
				if(xmlHttp.readyState == 4 && xmlHttp.status == 200)
				{
					// convertir una cadena a un objeto de json
					var datos = JSON.parse(xmlHttp.responseText);
					// Ver los datos
					//console.log(datos);
					if(resultado.innerHTML === "")
					{
						for (i in datos) 
						{
						// Para poner el resultado
						// con esto se repite indefinidamente, para esto, lo colocamos en un if
						resultado.innerHTML += datos[i].idEmpleado + " " + datos[i].nombre + " " + datos[i].apPaterno + " " + datos[i].apMaterno +"<br>"
						}
					}
					
				}
			}
			// Abrimos
			xmlHttp.open("GET", "empleados.json", true);
			// enviar
			xmlHttp.send();
		}
	</script>



	</body>
	</html>
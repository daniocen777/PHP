<!DOCTYPE html>
<html>
<head>
	<title>Lista de autores y obras</title>
	<meta charset="utf-8">
	<!-- Agregar estilos bootstrap-->
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/jquery-ui.min.css">
	<script type="text/javascript" src="../js/Funciones.js"></script>
</head>
<body onload="MostrarInformacion('');">
	<div class="form-group">
		<label for="nombre" class="col-lg-2 control-label">Búsqueda por nombre</label>
		<div class="col-lg-7">
			<input type="text" name="nombre" id="nombre" class="form-control" onkeyup="MostrarInformacion(this.value)" />
				
		</div>
		<div class="col-lg-3">
			<a align="right" class="btn btn-success" href="../index.php">Regresar</a>
		</div>
	</div>
	<br><br>

	<br>

	<div id="info"></div>

	<script type="text/javascript">
		var resultado = document.getElementById("info");
		function MostrarInformacion(nombre)
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
			xmlHttp.onreadystatechange = function()
			{
				if(xmlHttp.readyState == 4 && xmlHttp.status == 200)
				{
					resultado.innerHTML = xmlHttp.responseText;
				}
			}
			xmlHttp.open("GET", "../control/Control_ListarAutor.php?nombre="  + nombre, true);
		    xmlHttp.send();
		}
	</script>

</body>
</html>
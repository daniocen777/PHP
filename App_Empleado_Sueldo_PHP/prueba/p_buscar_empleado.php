<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form>
		Buscar persona: <input type="text" onkeyup="MostrarSugerencia(this.value)"/>
	</form>
	<p>Sugerencias: <span id="info"></span></p>

	<script type="text/javascript">
		var resultado = document.getElementById("info");
		function MostrarSugerencia(usuario)
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

			if(usuario.length == 0)
			{
				document.getElementById("info").innerHTML = "";
			}
			else
			{
				xmlHttp.onreadystatechange = function()
				{
					if(xmlHttp.readyState == 4 && xmlHttp.status == 200)
					{
						// Respuesta del servidor y mostrarlo en pantalla
						resultado.innerHTML = xmlHttp.responseText;
					}
				}
				xmlHttp.open("GET", "../control/c_buscar_usuario.php?nombre=" + usuario, true);
				xmlHttp.send();
			}
		}
	</script>
</body>
</html>
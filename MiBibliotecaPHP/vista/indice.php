<script type="text/javascript">
		var resultado = document.getElementById("MensajeNombre");
		function ValidarCampos()
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
			var nombre = document.getElementById('nombre').value;
			var desc = document.getElementById('MensajeDesc').value;
			var fotoAutor = document.getElementById('fotoAutor').value;
			var obra = document.getElementById('obra').value;
			var ano = document.getElementById('ano').value;
			var isbn = document.getElementById('isbn').value;
			var fotoObra = document.getElementById('fotoObra').value;
			var respuestaNombre = ValidaNombre2(nombre);
			var respuestaDesc = ValidaNombre2(respuestaNombre);
			var informacionAutor = "nombre=" + nombre + "&descripcion=" + desc + "&fotoAutor=" + fotoAutor + "&obra=" + obra + "&ano=" + ano + "&isbn=" + isbn + "&fotoObra=" + fotoObra;
			if(respuestaNombre == "poco")
			{
				resultado.innerHTML="<i class='fa fa-close'></i> <div class='alert alert-danger'><i class='fa fa-close'></i>Nombre mayor de 4 caracteres <input id='usernamechecker' type='hidden' value='0' name='usernamechecker'></div> ";
  				document.getElementById("guardar").disabled = true;
			}
			else if (respuestaNombre == "invalido") 
			{
				resultado.innerHTML="<i class='fa fa-close'></i> <div class='alert alert-danger'><i class='fa fa-close'></i>Nombre inválido (sin caracteres numéricos)<input id='usernamechecker' type='hidden' value='0' name='usernamechecker'></div> ";
  				document.getElementById("guardar").disabled = true;
			}
			else
			{
				resultado.innerHTML="<div class='alert alert-success'><i class='fa fa-close'></i>BIEN<input id='usernamechecker' type='hidden' value='0' name='usernamechecker'></div>";
				document.getElementById("guardar").disabled = false;
				xmlHttp.onreadystatechange = function()
				{
					if(xmlHttp.readyState == 4 && xmlHttp.status == 200)
					{
						resultado.innerHTML = xmlHttp.responseText;
					}
				}
				xmlHttp.open("POST", "control/Control_Insertar.php", true);
				// Para enviar la información del formulario al servidor
				xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				xmlHttp.send(informacionAutor);
			}
		}
	</script>
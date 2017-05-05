function ListarEmpleadoJson(valor)
{
	$.ajax({
			url:'../control/C_Buscar_Nombre.php',
			type:'POST',
			data:'valor='+valor+'&boton=buscar'
		}).done(function(resp){
			// alert(resp);
			var valores = eval(resp);
			// Para saber el tipo de dato que tiene o envía "eval" -> es un Array
			//alert( varoles instanceof Array);
			// Itinerar el eval
			var html="<table class='table table-striped table table-hover table table-condensed'><tr class='success'><td align='center'><strong>Id</strong></td>" + 
						"<td align='center'><strong>Nombre</strong></td>"+
						"<td align='center'><strong>Ap. Paterno</strong></td>"+
						"<td align='center'><strong>Ap. Materno</strong></td>"+
						"<td align='center'><strong>Fecha nacimiento</strong></td>"+
						"<td align='center'><strong>Área</strong></td>"+ 
						"<td align='center'><strong>Condición</strong></td>"+
						"<td align='center'><strong>Sueldo base</strong></td>"+
						"<td align='center'><strong>Cantidad de hijo</strong></td>"+
						"<td align='center'><strong>Tiempo de servicio</strong></td>"+
						"<td align='center'><strong>Costo de movilidad</strong></td>"+
						"<td align='center'><strong>Descuento AFP</strong></td>"+
						"<td align='center'><strong>Sueldo final</strong></td>"+
						"<td align='center'><strong>Editar</strong></td>"+
						"<td align='center'><strong>Eliminar</strong></td></tr><tr>";
			for(var i = 0; i<valores.length; i++)
			{
				// Agregamos los datos
				html+="<td align='center'>" + valores[i][0] + "</td>" + "<td align='center'>" + valores[i][1] + "</td>" + "<td align='center'>" + valores[i][2] + "</td>" +"<td>" + valores[i][3] + "</td>" + "<td>" + valores[i][4] + "</td>" + "<td>" + valores[i][5] + "</td>" + "<td>" + valores[i][6] + "</td>" + "<td>" + valores[i][7] + "</td>" + "<td>" + valores[i][8] + "</td>" + "<td>" + valores[i][9] + "</td>" + "<td>" + valores[i][10] + "</td>" + "<td>" + valores[i][11] + "</td>" + "<td>" + valores[i][12] + "</td></tr>";
				
			}
			html+="</table>";
			$("#lista").html(html);
		});
}
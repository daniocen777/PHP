function ListaEmpleados(valor)
{
	$.ajax({
		url: '../control/C_Buscar_Nombre.php',
		type: 'POST',
		data: 'valor='+valor+'&boton=buscar'
	}).done(function(resp){
		var valores = eval(resp);
		html = "<table class='table table-border'> <thead><tr><th>#</th><th>Nombre</th><th>Ap. Paterno</th><th>Ap. Materno</th><th>Fecha Nacimiento</th><th>Área</th><th>Condición</th><th>Sueldo base</th><th>Hijos</th><th>Tiempo</th><th>Movilidad</th><th>Descuento</th><th>Sueldo final</th></tr></thead><tbody></tbody>";
		for (i = 0; i < valores.length(); i++) {
			html+="<tr><td>"+valores[i][1]+"</td><td>"+valores[i][2]+"</td><td>"+valores[i][3]+"</td><td>"+valores[i][4]+"</td><td>"+valores[i][5]+"</td><td>"+valores[i][6]+"</td><td>"+valores[i][7]+"</td><td>"+valores[i][8]+"</td><td>"+valores[i][9]+"</td><td>"+valores[i][10]+"</td><td>"+valores[i][11]+"</td><td>"+valores[i][12]+"</td><td>"+valores[i][13]+"</td></tr>";
			html+="</tbody></table>";
			$("$lista").html(html);
		}
	});
}
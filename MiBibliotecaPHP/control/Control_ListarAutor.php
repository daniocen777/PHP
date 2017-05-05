<?php 
	require_once '../dao/MiBibliotecaDao.php';

	$miBiblioteca = new MiBibliotecaDao();
	$valor = $_GET['nombre'];
	$valores = $miBiblioteca->ListarAutor($valor);

	$htmlo = '';
	
	$htmlo .= '<table class="table table-striped table table-hover table table-condensed" table table-bordered><tr class="success"><td align="center"><strong>Id</strong></td>' . 
			'<td align="center"><strong>Autor</strong></td>'.
			'<td align="center"><strong>Descripción</strong></td>'.
			'<td align="center"><strong>Foto de autor</strong></td>'.
			'<td align="center"><strong>Obra</strong></td>'.
			'<td align="center"><strong>Año</strong></td>'. 
			'<td align="center"><strong>ISBN</strong></td>'.
			'<td align="center"><strong>Foto de obra</strong></td>'.
			'<td align="center"><strong>Editar</strong></td>'.
			'<td align="center"><strong>Eliminar</strong></td>'.
			'</tr>';
	for($i = 0; $i < sizeof($valores); $i++)
	{
		$eli = "../control/Control_Eliminar.php?id=" . $valores[$i]['idAutor'];
		$editar = "CaptarAutor.php?id=" . $valores[$i]['idAutor'];
		$htmlo .= '<tr><td align="center">' . $valores[$i]["idAutor"] . '</td>' . '<td align="center">' . $valores[$i]["nombreAutor"] . '</td>' . '<td align="center">' . $valores[$i]["descripcion"] . '</td>' . '<td align="center">' . '<img src="../foto/'. $valores[$i]['imagenAutor'].'" width="140" height="130">' . '</td>' . '<td align="center">' . $valores[$i]["nombreObra"] . '</td>' . '<td align="center">' . $valores[$i]["ano"] . '</td>' . '<td align="center">' . $valores[$i]["ISBN"] . '</td>' . '<td align="center">' . '<img src="../foto/'. $valores[$i]['imagenObra'].'" width="130" height="140">' . '</td>'. '<td align="center"><a href="javascript:void(0);" onclick="window.location='."'". $editar."'".'"><span class="glyphicon glyphicon-edit" title="Editar"></span></a> 
						 </td>'. '<td align="center"><a href="javascript:void(0);" onclick="Eliminar('."'".$eli."'".')"><span class="glyphicon glyphicon-remove" title="Eliminar"></span></a> 
						 </td>' .'</tr>';
	}

	$htmlo .= '</table>';

	echo $htmlo;
 ?>
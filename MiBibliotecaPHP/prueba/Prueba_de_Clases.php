<?php 
	require_once "../modelo/Autor.php";
	require_once "../modelo/Obra.php";

	$autor = new Autor("José Saramago", "Premio Nobel 1998", "fotoSaramago");
	$obra = new Obra("La caverna", "2002", "4333rrrg", "fotoOPortada");

	echo $autor->getNombreAutor() . " || " . $autor->getImagenAutor() . " || " . $obra->getNombreObra() . " || " . $obra->getAño();
 ?>
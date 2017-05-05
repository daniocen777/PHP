<?php 
	require_once "../modelo/Autor.php";
	require_once "../modelo/Obra.php";
	require_once "../dao/MiBibliotecaDao.php";

	$id = $_POST["id"];
	// Captar tosos los datos del index
	$nombre = strtoupper($_POST["nombre"]);
	$descripcion = strtoupper($_POST["descripcion"]);
	$fotoAutor = $_FILES["fotoAutor"]["name"];
	$rutaAutor = $_FILES["fotoAutor"]["tmp_name"];
	$destinoAutor = "../foto/" . $fotoAutor;
	//copy($rutaAutor, $destinoAutor);

	$obra = strtoupper($_POST["obra"]);
	$año = strtoupper($_POST["ano"]);
	$isbn = strtoupper($_POST["isbn"]);
	$fotoObra = $_FILES["fotoObra"]["name"];
	$rutaObra = $_FILES["fotoObra"]["tmp_name"];
	$destinoObra = "../foto/" . $fotoObra;
	//copy($rutaObra, $destinoObra);

	// Creando objetos de mis clases
	$objetoAutor = new Autor($nombre, $descripcion, $destinoAutor);
	$objetoObra = new Obra($obra, $año, $isbn, $destinoObra);

	// Insertarmos datos
	$miBiblioteca = new MiBibliotecaDao();
	$miBiblioteca->EditarAutor($id, $objetoAutor, $objetoObra);

	//echo $objetoAutor->getNombreAutor() . "|||" . $objetoAutor->getImagenAutor();
 ?>
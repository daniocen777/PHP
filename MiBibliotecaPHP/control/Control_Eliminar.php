<?php 
	require_once '../dao/MiBibliotecaDao.php';
	$miBilioteca = new MiBibliotecaDao();
	$miBilioteca->EliminarAutor($_GET["id"]);
 ?>
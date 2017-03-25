<?php 
	require_once "../dao/SesionDao.php";
	// Iniciiar una nueva sesión
	session_start();
	// Captura de variables del index
	$usuario = $_POST["nombre"];
	$pass = $_POST["password"];

	$sesionDao = new SesionDao();
	$resultado = $sesionDao->ValidarUsuario($usuario, $pass);

	if($resultado == "Si")
	{
		$_SESSION["u_usuario"] = $usuario;
		header("Location: ../vistas/Pagina1.php");
	}
	else
	{
		header("Location: ../index.php");	
	}
 ?>
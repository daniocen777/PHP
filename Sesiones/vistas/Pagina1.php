<!DOCTYPE html>
<html>
<head>
	<title>PÁGINA 1</title>
	<meta charset="utf-8">
</head>
<body>
	<h1>PÁGINA 1</h1>
	<?php 
		// Iniciar la sesión
		session_start();
		// Si existe la sesión
		if(isset($_SESSION["u_usuario"]))
		{
			echo "Sesión exitosa <br>";
			echo "<a href='cerrar.php'>Cerrar</a> <br>";
		}
		else
		{
			echo "No hay sesión <br>";	
			header("Location: ../index.php");
		}

	 ?>
	 <a href="Pagina2.php">Ir a página 3</a>
</body>
</html>
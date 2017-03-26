<!DOCTYPE html>
<html>
<head>
	<title>Página 2</title>
	<meta charset="utf-8">
</head>
<body>
	<?php 
		session_start();
		// Capturar el nombre
		$nombre = $_SESSION["u_usuario"];
		echo "Holasss " . $nombre;
 	?>
</body>
</html>
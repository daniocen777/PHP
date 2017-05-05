<?php 
	require_once '../dao/MiBibliotecaDao.php';
	$miBilioteca = new MiBibliotecaDao();
	$registro = $miBilioteca->getAutor($_GET["id"]);
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Autor</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/jquery-ui.min.css">
</head>
<body>
<div class="container">
	<form role="form" method="POST" action="../control/Control_EditarAutor.php" enctype="multipart/form-data">
		<div class="row">
			<div class="col-md-12">
				<div class="form-group">
					<h1>DATOS DEL AUTOR  <span class="glyphicon glyphicon-user" aria-hidden="true"></span></h1>
				</div>
			</div>
		</div>

	    <div class="row">
			<div class="col-md-2"><label for="nombre" control-label">Nombre</label>
			</div>
			<div class="col-md-10"><input type="text" name="nombre" class="form-control" id="nombre" value="<?php echo $registro[0]["nombreAutor"];?>" required />
			</div>
				 
		</div>

		<div class="row">
			<div class="col-md-2"><label for="descripcion" control-label">Descripción</label></div>
			<div class="col-md-10"><textarea class="form-control" rows="3" name="descripcion" id="descripcion" ><?php echo $registro[0]["descripcion"];?></textarea></div>
			
		</div>


		<div class="row">
			<div class="col-md-2"><label for="fotoAutor" control-label">Foto del autor</label></div>
			<div class="col-md-10"><input type="file" name="fotoAutor" class="form-control"  value="<?php echo $registro[0]["imagenAutor"];?>" id="fotoAutor" /></div>
		</div>

		<div class="col-md-12">
			<div class="form-group">
				<h1>DATOS DE LA OBRA  <span class="glyphicon glyphicon-book" aria-hidden="true"></span></h1>
			</div>
		</div>

		<div class="row">
			<div class="col-md-2"><label for="obra" control-label">Obra</label></div>
			<div class="col-md-10"><input type="text" name="obra" class="form-control"  id="obra" value="<?php echo $registro[0]["nombreObra"];?>" required/></div>
			
		</div>

		<div class="row">
			<div class="col-md-2"><label for="ano" control-label">Año</label></div>
			<div class="col-md-10"><input type="text" name="ano" class="form-control" value="<?php echo $registro[0]["ano"];?>" id="ano"/>	</div>
		</div>

		<div class="row">
			<div class="col-md-2"><label for="isbn" control-label">ISBN</label></div>
			<div class="col-md-10"><input type="text" name="isbn" class="form-control" value="<?php echo $registro[0]["ISBN"];?>" id="isbn"/></div>
		</div>

		<div class="row">
			<div class="col-md-2"><label for="fotoObra" control-label">Foto de la obra</label></div>
			<div class="col-md-10"><input type="file" name="fotoObra" class="form-control" value="<?php echo $registro[0]["imagenObra"];?>" id="fotoObra" /></div>
		</div>

		<div class="row">
				<button type="submit" class="btn btn-primary" id="guardar">Guardar  <span class="glyphicon glyphicon-floppy-save" aria-hidden="true"></span>
				</button>
				<a href="Lista_AutorObra.php" class="btn btn-warning">Cancelar</a>
		</div>
		<input type="hidden" name="id" value="<?PHP echo $_GET["id"]; ?>"/>
	</form>
</div>

	<script src="../js/jquery.js"></script>
	<script src="../js/bootstrap.min.js"></script>	
	<script src="../js/jquery-ui.min.js"></script>
</body>
</html>
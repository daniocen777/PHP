<?php 
	require_once 'Conexion.php';
	require_once '../modelo/Autor.php';
	require_once '../modelo/Obra.php';

	class MiBibliotecaDao
	{
		private $autor;

		public function __construct()
		{
			$this->autor = array();
		}

		// Función para insertar en las tablas autor y obra mediante un procedimiento almacenado llamado "P_Insertar_Mi_Biblioteca"
		public function InsertarAutor($autor, $obra)
		{
			if(!Conexion::Conectar()->query("CALL P_Insertar_Mi_Biblioteca('{$autor->getNombreAutor()}', '{$autor->getDescripcion()}', '{$autor->getImagenAutor()}', '{$obra->getNombreObra()}', '{$obra->getAño()}', '{$obra->getIsbn()}', '{$obra->getImagenObra()}')"))
    		{
    			echo "Falló la llamada: (" . $mysqli->errno . ") " . $mysqli->error;
    		}
            Conexion::Conectar()->close();
             echo '<script type="text/javascript">window.location="../vista/Msj_Insertar.php";</script>';
		}

		// Función para listar a los autores con sus respectivas obras mediante una vista cuyo parámero de entrada será el nombre del autor; la lista será dinámica.
		public function ListarAutor($valor)
		{
			$query = "SELECT * FROM v_autor_obra where nombreAutor LIKE '%".$valor."%'";
			$resultado = Conexion::Conectar()->query($query);
			while($registro = $resultado->fetch_assoc())
			{
				$this->autor[] = $registro;
			}
			return $this->autor;
			$resultado->free();
            Conexion::Conectar()->close();
		}

		// Función para eliminar los registros (con el identificador [id] de entrda) para borrar los datos de las tablas "autor" y "obra" mediante un procedimiento almacenado 
		public function EliminarAutor($id)
		{
			if(!Conexion::Conectar()->query("CALL eliminar('$id')"))
			{
				echo "Falló la llamada: (". $mysqli->erno .")" . $mysqli->error;
			}
			Conexion::Conectar()->close();
			echo '<script type="text/javascript">window.location="../index.php";</script>';
		}

		// Función para capturar a un autor con su obra (1 solo registro) mediante su identificador (idAutor)
		public function getAutor($id)
		{
			$query = "SELECT * FROM v_autor_obra where idAutor = '$id'";
			$resultado = Conexion::Conectar()->query($query);
			if($registro = $resultado->fetch_assoc())
			{
				$this->autor[] = $registro;
				return $this->autor;
			}
			else
			{
				echo '<script type="text/javascript">alert("Este código no existe"); window.location="../vista/Lista_AutorObra.php";</script>';
			}
			Conexion::Conectar()->close();
		}

		public function EditarAutor($id, $autor, $obra)
		{
			if(!Conexion::Conectar()->query("CALL P_Editar_Mi_Biblioteca('$id','{$autor->getNombreAutor()}', '{$autor->getDescripcion()}', '{$autor->getImagenAutor()}', '{$obra->getNombreObra()}', '{$obra->getAño()}', '{$obra->getIsbn()}', '{$obra->getImagenObra()}')"))
			{
				echo "Falló la llamada: (" . $mysqli->errno . ") " . $mysqli->error;
    		}
            Conexion::Conectar()->close();
            echo '<script type="text/javascript">window.location="../vista/Lista_AutorObra.php";</script>';
		}
	}
 ?>
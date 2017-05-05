<?php 
	class Autor
	{
		private $id;
		private $nombreAutor;
		private $descripcion;
		private $imagenAutor;

		public function Autor($nombreAutor, $descripcion, $imagenAutor)
		{
			$this->nombreAutor = $nombreAutor;
			$this->descripcion = $descripcion;
			$this->imagenAutor = $imagenAutor;
		}

		public function getId()
		{
			return $this->id;
		}

		public function setId($id)
		{
			$this->id = $id;
		}

		public function getNombreAutor()
		{
			return $this->nombreAutor;
		}

		public function setNombreAutor($nombreAutor)
		{
			$this->nombreAutor = $nombreAutor;
		}

		public function getDescripcion()
		{
			return $this->descripcion;
		}

		public function setDescripcion($descripcion)
		{
			$this->descripcion = $descripcion;
		}
		public function getImagenAutor()
		{
			return $this->imagenAutor;
		}

		public function setImagenAutor($imagenAutor)
		{
			$this->imagenAutor = $imagenAutor;
		}
	}
 ?>
<?php 
	class Obra
	{
		private $id;
		private $nombreObra;
		private $año;
		private $isbn;
		private $imagenObra;

		public function Obra($nombreObra, $año, $isbn, $imagenObra)
		{
			$this->nombreObra = $nombreObra;
			$this->año = $año;
			$this->isbn = $isbn;
			$this->imagenObra = $imagenObra;
		}
		public function getId()
		{
			return $this->id;
		}

		public function setId($id)
		{
			$this->id = $id;
		}

		public function getNombreObra()
		{
			return $this->nombreObra;
		}

		public function setNombreObra($nombreObra)
		{
			$this->nombreObra = $nombreObra;
		}

		public function getAño()
		{
			return $this->año;
		}

		public function setAño($año)
		{
			$this->año = $año;
		}

		public function getIsbn()
		{
			return $this->isbn;
		}

		public function setIsbn($isbn)
		{
			$this->isbn = $isbn;
		}
		public function getImagenObra()
		{
			return $this->imagenObra;
		}

		public function setImagenObra($imagenObra)
		{
			$this->imagenObra = $imagenObra;
		}
	}
 ?>
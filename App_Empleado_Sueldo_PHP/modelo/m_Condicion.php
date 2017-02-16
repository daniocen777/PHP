<?php 
	class Condicion
	{
		private $id;
		private $nombreCondicion;

		public function Condicion($nombreCondicion)
		{
			$this->nombreCondicion = $nombreCondicion;
		}

		public function getId()
		{
			return $this->id;
		}

		public function setId($id)
		{
			$this->id = $id;
		}

		public function getNombreCondicion()
		{
			return $this->nombreCondicion;
		}

		public function setNombreCondicion($nombreCondicion)
		{
			$this->nombreCondicion = $nombreCondicion;
		}
	}
 ?>
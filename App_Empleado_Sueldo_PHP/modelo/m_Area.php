<?php 
	class Area
	{
		private $id;
		private $nombreArea;

		public function Area($nombreArea)
		{
			$this->nombreArea = $nombreArea;
		}

		public function getId()
		{
			return $this->id;
		}

		public function setId($id)
		{
			$this->id = $id;
		}

		public function getNombreArea()
		{
			return $this->nombreArea;
		}

		public function setNombreArea($nombreArea)
		{
			$this->nombreArea = $nombreArea;
		}
	}
 ?>
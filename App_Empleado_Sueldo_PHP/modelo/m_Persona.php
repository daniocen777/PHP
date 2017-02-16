<?php 
	class Persona
	{
		private $id;
		private $nombre;
		private $apPaterno;
		private $apMaterno;
		private $fechaNacimiento;

		public function Persona($nombre, $apPaterno, $apMaterno, $fechaNacimiento)
		{
			$this->nombre = $nombre;
			$this->apPaterno = $apPaterno;
			$this->apMaterno = $apMaterno;
			$this->fechaNacimiento = $fechaNacimiento;
		}

		public function getId()
		{
			return $this->id;
		}

		public function setId($id)
		{
			$this->id = $id;
		}

		public function getNombre()
		{
			return $this->nombre;
		}

		public function setNombre($nombre)
		{
			$this->nombre = $nombre;
		}

		public function getApPaterno()
		{
			return $this->apPaterno;
		}

		public function setApPaterno($apPaterno)
		{
			$this->apPaterno = $apPaterno;
		}

		public function getApMaterno()
		{
			return $this->apMaterno;
		}

		public function setApMaterno($apMaterno)
		{
			$this->apMaterno = $apMaterno;
		}

		public function getFechaNacimiento()
		{
			return $this->fechaNacimiento;
		}

		public function setFechaNacimiento($fechaNacimiento)
		{
			$this->fechaNacimiento = $fechaNacimiento;
		}
	}
 ?>
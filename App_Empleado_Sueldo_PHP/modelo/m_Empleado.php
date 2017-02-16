<?php 
	//include 'm_Persona.php';
	//include 'm_Area.php';
	//include 'm_Condicion.php';

	class Empleado
	{
		private $id;
		private $sueldo;
		private $tiempoDeServicio;
		private $numeroHijos;
		private $movilidad;
		private $descuentoAfp;
		private $sueldoTotal;
		private $Persona;
		private $Area;
		private $Condicion;

		public function Empleado($sueldo, $tiempoDeServicio, $numeroHijos)
		{
			$this->sueldo = $sueldo;
			$this->tiempoDeServicio = $tiempoDeServicio;
			$this->numeroHijos = $numeroHijos;
		}

		public function getId()
		{
			return $this->id;
		}

		public function setId($id)
		{
			$this->id = $id;
		}

		public function getSueldo()
		{
			return $this->sueldo;
		}

		public function setSueldo($sueldo)
		{
			$this->sueldo = $sueldo;
		}

		public function getTiempoDeServicio()
		{
			return $this->tiempoDeServicio;
		}

		public function setTiempoDeServicio($tiempoDeServicio)
		{
			$this->tiempoDeServicio = $tiempoDeServicio;
		}

		public function getNumeroHijos()
		{
			return $this->numeroHijos;
		}

		public function setNumeroHijos($numeroHijos)
		{
			$this->numeroHijos = $numeroHijos;
		}

		public function getMovilidad()
		{
			return $this->movilidad;
		}

		public function setMovilidad($movilidad)
		{
			$this->movilidad = $movilidad;
		}

		public function getDescuentoAfp()
		{
			return $this->descuentoAfp;
		}

		public function setDescuentoAfp($descuentoAfp)
		{
			$this->descuentoAfp = $descuentoAfp;
		}

		public function getSueldoTotal()
		{
			return $this->sueldoTotal;
		}

		public function setSueldoTotal($sueldoTotal)
		{
			$this->sueldoTotal = $sueldoTotal;
		}

		public function getPersona()
		{
			return $this->persona;
		}

		public function setPersona($persona)
		{
			$this->persona = $persona;
		}

		public function getArea()
		{
			return $this->area;
		}

		public function setArea($area)
		{
			$this->area = $area;
		}

		public function getCondicion()
		{
			return $this->condicion;
		}

		public function setCondicion($condicion)
		{
			$this->condicion = $condicion;
		}
	}
 ?>
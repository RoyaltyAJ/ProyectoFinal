<?php 
	include_once 'DatosPersonales';
	class Persona extends DatosPersonales
	{
		public $Nombre;
		public $Apellido;
		public $FechaNacimiento;
		public $Genero;
		public $Edad;
		public function __construct($Nombre, $Apellido, $FechaNacimiento, $Genero)
		{
			$this->Nombre = $Nombre;
			$this->Apellido = $Apellido;
			$this->Fecha_Nacimiento = $FechaNacimiento;
			$this->Genero = $Genero;
			Calcular_Edad($FechaNacimiento);
		}
		private function Calcular_Edad($FechaNacimiento)
		{
			$y = new DateTime();
			$y = (int) $y->format('Y');
			$this->Edad = $y - (int) $FechaNacimiento;
		}
	}
?>
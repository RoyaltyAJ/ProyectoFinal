<?php 
	abstract class DatosPersonales
	{
		public $Nombre;
		public $Apellido;
		public $FechaNacimiento;
		public $Genero;

		abstract protected function Calcular_Edad();
	}
 ?>
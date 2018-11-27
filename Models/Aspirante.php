<?php
	class Aspirante
	{
		public $Cedula;
		public $Partida_Nacimiento;
		public $Titulo_Bachiller;
		public $Certificado_Notas;
		public $OPSU;
		public $Fondo_Negro;
		public $Nombre;
		public $Apellido;
		public $Fecha_Nacimiento;
		public $Genero;

		public function __construct(
			$Cedula,
			$Partida_Nacimiento,
			$Titulo_Bachiller,
			$Certificado_Notas,
			$OPSU,
			$Fondo_Negro,
			$Nombre,
			$Apellido,
			$Fecha_Nacimiento,
			$Genero
			) 
		{
			$this->Cedula = $Cedula;
			$this->Partida_Nacimiento = $Partida_Nacimiento;
			$this->Titulo_Bachiller = $Titulo_Bachiller;
			$this->Certificado_Notas = $Certificado_Notas;
			$this->OPSU = $OPSU;
			$this->Fondo_Negro = $Fondo_Negro;
			$this->Nombre = $Nombre;
			$this->Apellido = $Apellido;
			$this->Fecha_Nacimiento = $Fecha_Nacimiento;
			$this->Genero = $Genero;
		}
	}
?>
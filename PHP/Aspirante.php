<?php
	include_once 'Personas.php';
	include_once 'Requisitos.php';

	class Aspirante
	{
		public $Requisitos;
		public $Persona;

		public function __construct($requisitos, $persona)
		{
			$this->Requisitos = $Requisitos;
			$this->Persona = $Persona;
		}
	}
 ?>
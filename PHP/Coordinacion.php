<?php 
	include_once 'Aspirante.php';

	class Coordinacion 
	{
		public $Aspirante;
		public function __construct($Aspirante)
		{
			$this->Aspirante = $Aspirante; 
		}
		
		public function Verificar_Documentos()
		{
			if (!($this->Aspirante->Requisitos->Titulo_Bachiller && $this->Aspirante->Requisitos->OPSU)) {
				return false;
			} else {
				return true;
			}
		}
		
		
	}

?>


<?php 
	class Requisitos 
	 {
	 	public $Cedula;
	 	public $PartidaNacimiento;
	 	public $TituloBachiller;
	 	public $CertificadoNotas;
	 	public $OPSU;
	 	public $FondoNegro;
	 	public function __construct(
			$Cedula,
			$PartidaNacimiento,
			$TituloBachiller,
			$CertificadoNotas,
			$OPSU,
			$FondoNegro
		)
	 	{
	 		$this->Cedula = $Cedula;
	 		$this->Partida_Nacimiento = $PartidaNacimiento;
	 		$this->Titulo_Bachiller = $TituloBachiller;
	 		$this->Certificado_Notas = $CertificadoNotas;
	 		$this->OPSU = $OPSU;
	 		$this->FondoNegro = $FondoNegro;
	 	}
	 }
 ?>
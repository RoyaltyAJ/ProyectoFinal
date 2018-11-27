<?php  	
	include_once 'Models/Aspirante.php';
	include_once "SQL/SelectSQL.php";
	include_once 'SQL/Update.php';
	include_once "Coordinacion.php";
	
	$content = trim(file_get_contents("php://input"));
	$decoded = json_decode($content, true);
	header('Access-Control-Allow-Origin: *');
	header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
	header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');
	header('Content-Type: application/json');

	$Cedula = $decoded ["Cedula"];
	$PartidaNacimiento = $decoded ["Partida_Nacimiento"];
	$TituloBachiller = $decoded ["Titulo_Bachiller"];
	$CertificadoNotas = $decoded ["Certificado_Notas"];
	$OPSU = $decoded ["OPSU"];
	$FondoNegro = $decoded ["Fondo_Negro"];

	 function Select($valor = null)
	{
		$condiciones = array('Aspirante_Id' => array('Condicion' => '=', 'Valor' = "{$valor}"));

		$select = new SelectSQL();
		$result = $select->Obtener(new Aspirante(), $condiciones);
	 	return $result;
	}
	function Update(){
		$condiciones = array(
			array("Aspirante_Id" => array("Valor" => "2", "Condicion" => "=" ))
		);
		$Aspirante = new Aspirante($Requisitos, $Persona);
		$update = new UpdateSQL();
		$update->Actualizar($colombia, $condiciones);
	}
	try {
		Select();
		Update();
		http_response_code(200);
		echo json_encode($arrays);
	} catch (Exception $e) {
		$return = array(
			'resultado' => $e->getMessage()
		);
		http_response_code(501);
		echo(json_encode($return));	
	}
		$Coordinacion = new Coordinacion ($Aspirante);
?>
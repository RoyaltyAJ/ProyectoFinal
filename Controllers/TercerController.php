<?php 
	include_once "Coordinacion.php";
	include_once 'Models/Estudiante.php';
	include_once "SQL/InsertSQL.php";
	
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
	function Select() {
		$select = new SelectSQL();
		$result = $select->Obtener(new Aspirante());
		return $result;
	}

	try {
		Select();
		$array = Select();
		http_response_code(200);
		echo json_encode($array);	
	} catch (Exception $e) {
		$return = array(
			'resultado' => $e->getMessage()
		);
		http_response_code(501);
		echo json_encode($return);
	}
?>
	

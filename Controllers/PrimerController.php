<?php
	include_once "../Models/Aspirante.php";
	include_once "../SQL/InsertSQL.php";
	include_once "../SQL/SelectSQL.php";
	
	$content = trim(file_get_contents("php://input"));
	$decoded = json_decode($content, true);
	header('Access-Control-Allow-Origin: *');
	header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
	header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');
	header('Content-Type: application/json');

	if(!is_array($decoded)) {
		throw new Exception('Received content contained invalid JSON!');
	}

	$Cedula = $decoded["Cedula"];
	$PartidaNacimiento = $decoded["Partida_Nacimiento"];
	$TituloBachiller = $decoded["Titulo_Bachiller"];
	$CertificadoNotas = $decoded["Certificado_Notas"];
	$OPSU = $decoded["OPSU"];
	$FondoNegro = $decoded["Fondo_Negro"];
	$Nombre = $decoded["Nombre"];
	$Apellido = $decoded["Apellido"];
	$FechaNacimiento = $decoded["Fecha_Nacimiento"];
	$Genero = $decoded["Genero"];

	function Insert (
		$Cedula,
		$PartidaNacimiento,
		$TituloBachiller,
		$CertificadoNotas,
		$OPSU,
		$FondoNegro,
		$Nombre,
		$Apellido,
		$FechaNacimiento,
		$Genero
		) {
		$Aspirante = new Aspirante(
			$Cedula,
			$PartidaNacimiento,
			$TituloBachiller,
			$CertificadoNotas,
			$OPSU,
			$FondoNegro,
			$Nombre,
			$Apellido,
			$FechaNacimiento,
			$Genero
		);

		$insert = new InsertSQL();
		$insert->Insertar($Aspirante);
	}
	
	function Select() {
		$select = new SelectSQL();
		$result = $select->Obtener(new Aspirante());
		return $result;
	}

	try {
		Insert(
			$Cedula,
			$PartidaNacimiento,
			$TituloBachiller,
			$CertificadoNotas,
			$OPSU,
			$FondoNegro,
			$Nombre,
			$Apellido,
			$FechaNacimiento,
			$Genero
		);
		http_response_code(200);
	} catch (Exception $e) {
		$return = array(
			'resultado' => $e->getMessage()
		);
		http_response_code(501);
		echo json_encode($return);
	}
?>
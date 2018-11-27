<?php

	include_once "Coordinacion.php";
	include_once 'Models/Aspirante.php';
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

	

	function Insert ()
	{
		$Aspirante = new Aspirante(
			$Cedula,
			$Partida_Nacimiento,
			$Titulo_Bachiller,
			$Certificado_Notas,
			$OPSU,
			$Fondo_Negro,
			$Nombre,
			$Apellido,
			$Fecha_Nacimiento,
			$Genero, 
			$Requisitos
		);
			
		$insert = new InsertSQL();
		$insert->Insertar($Aspirante);
	}

	try {
		Insert();
		http_response_code(200);
		echo json_encode($arrays);
	} catch (Exception $e) {
		$return = array(
			'resultado' => $e->getMessage()
		);
		http_response_code(501);
		echo(json_encode($return));	
	}

 	$Coordinacion = new Coordinacion($Aspirante);	
?>
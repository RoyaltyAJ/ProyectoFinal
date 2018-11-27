<?php
	include_once 'MySQL.php';

	class InsertSQL extends MySQL
	{
		protected function PrepararSentenciaSQL($objeto, $condicionales = null){
			$nombreClase = get_class($objeto);
			$identificador = $nombreClase."_Id";



			$this->SentenciaSQL = "INSERT INTO {$this->Tablas[$nombreClase]} ({$campos}) VALUES ('{$valores}')";
		}

		function Insertar($objeto) {
			$this->PrepararSentenciaSQL($objeto);
			$this->DB->query($this->SentenciaSQL);
			return $this->DB->insert_id;
		}		
	}
?>
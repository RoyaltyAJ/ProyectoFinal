<?php
	include_once 'MySQL.php';

	class InsertSQL extends MySQL
	{
		protected function PrepararSentenciaSQL($objeto, $condicionales = null){
			$nombreClase = get_class($objeto);
			$identificador = $nombreClase."_Id";

			$array = (array) $objeto;

			unset($array[$identificador]);

			$this->Llaves = array_keys($array);
			$this->Valores = array_values($array);

			$campos = implode(',', $this->Llaves);
			$valores = implode("','", $this->Valores);

			$this->SentenciaSQL = "INSERT INTO {$this->Tablas[$nombreClase]} ({$campos}) VALUES ('{$valores}')";
			var_dump($this->SentenciaSQL);
		}

		function Insertar($objeto) {
			$this->PrepararSentenciaSQL($objeto);
			$this->DB->query($this->SentenciaSQL);
			return $this->DB->insert_id;
		}		
	}
?>
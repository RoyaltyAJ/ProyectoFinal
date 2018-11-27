<?php
	require_once 'MySQL.php';

	class UpdateSQL extends MySQL
	{
		protected function PrepararSentenciaSQL($objeto, $condicionales = null){
			$nombreClase = get_class($objeto);
			$identificador = $nombreClase."_Id";

			$array = (array) $objeto;
			unset($array[$identificador]);
			$fields = array();

			foreach($array as $field => $val) {
				$fields[] = "$field = '$val'";
			}

			$this->SentenciaSQL = "UPDATE ".$this->Tablas[$nombreClase]." SET ".join(', ', $fields);
			$where = $this->GenerarWhere($condicionales);
			$this->SentenciaSQL = "{$this->SentenciaSQL} {$where}";
		}

		function Actualizar($objeto, $condicionales = null) {
			$this->PrepararSentenciaSQL($objeto, $condicionales);
			$this->DB->query($this->SentenciaSQL);
		}
	}
?>
<?php
	require_once 'MySQL.php';

	class DeleteSQL extends MySQL
	{
		protected function PrepararSentenciaSQL($clase, $condicionales = null){
			$nombreClase = get_class($clase);
			$this->Llaves = array_keys((array) $clase);

			$camposSentenciaSQL = implode(",", $this->Llaves);
			
			$this->SentenciaSQL = "DELETE FROM {$this->Tablas[$nombreClase]}";

			$where = $this->GenerarWhere($condicionales);
			$this->SentenciaSQL = "{$this->SentenciaSQL} {$where}";
		}

		function Eliminar($clase, $condicionales) {
			$this->PrepararSentenciaSQL($clase, $condicionales);
			$this->DB->query($this->SentenciaSQL);
		}
	}
?>
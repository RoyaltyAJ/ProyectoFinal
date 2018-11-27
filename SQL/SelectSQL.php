<?php
	require_once 'MySQL.php';

	class SelectSQL extends MySQL
	{
		protected function PrepararSentenciaSQL($clase, $condicionales = null){
			$nombreClase = get_class($clase);
			$this->Llaves = array_keys((array) $clase);

			$camposSentenciaSQL = implode(",", $this->Llaves);

			$this->SentenciaSQL = "SELECT {$camposSentenciaSQL} FROM {$this->Tablas[$nombreClase]} ";

			if (isset($condicionales)) {
				$where = $this->GenerarWhere($condicionales);
				$this->SentenciaSQL = "{$this->SentenciaSQL} {$where}";
			}
		}

		function Obtener($clase, $condicionales = null) {
			$this->PrepararSentenciaSQL($clase, $condicionales);

			if ($stmt = $this->DB->prepare($this->SentenciaSQL)) {
				$stmt->execute();
				$result = $stmt->get_result();

				while ($row = $result->fetch_array(MYSQLI_NUM)) {	
					$retorno = [];
					for ($i=0; $i < sizeof($row); $i++) { 
						$retorno[$this->Llaves[$i]] = $row[$i];
					}
					array_push($this->Retorno, $retorno);
				}
			}
			return $this->Retorno;
		}
	}
?>
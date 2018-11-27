<?php
    class Estudiante
    {
        public $Aspirante_FK;
        public function __construct($Aspirante_FK)
        {
            $this->Aspirante_FK = $Aspirante_FK;
        }
    }
?>
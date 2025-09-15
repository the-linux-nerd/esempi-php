<?php

    class Docenti extends Persone {

        private $materia;

        function __construct( $nome, $data_nascita, $materia ) {
            parent::__construct( $nome, $data_nascita );
            $this->materia = $materia;
        }

        public function getMateria() {
            return $this->materia;
        }

        public function setMateria( $materia ) {
            $this->materia = $materia;
        }

        function __destruct() {
            echo "Distrutto l'oggetto docente " . $this->getNome() . "<br>";
            parent::__destruct();
        }

        function getNome() {
            return 'prof. ' . parent::getNome();
        }

    }

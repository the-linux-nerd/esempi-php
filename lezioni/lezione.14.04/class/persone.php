<?php

    class Persone {

        private $nome;
        private $data_nascita;

        function __construct( $nome, $data_nascita ) {
            if ( DateTime::createFromFormat( 'Y-m-d', $data_nascita ) !== false ) {
                $this->nome = $nome;
                $this->data_nascita = $data_nascita;
            } else {
                $this->nome = $nome;
                $this->data_nascita = '1900-01-01';
            }
        }

        function __destruct() {
            echo "Distrutto l'oggetto " . $this->nome . "<br>";
        }

        function getEta() {
            $nascita = new DateTime( $this->data_nascita );
            $oggi = new DateTime();
            $differenza = $oggi->diff( $nascita );
            return $differenza->y;
        }

        public function getNome() {
            return $this->nome;
        }

        public function getDataNascita() {
            return $this->data_nascita;
        }

        public function setNome( $nome ) {
            $this->nome = $nome;
        }

        public function setDataNascita( $data_nascita ) {
            if ( DateTime::createFromFormat( 'Y-m-d', $data_nascita ) !== false ) {
                $this->data_nascita = $data_nascita;
            }
        }

    }

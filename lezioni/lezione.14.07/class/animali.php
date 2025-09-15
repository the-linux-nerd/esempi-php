<?php

    abstract class Animali {

        public $nome;
        public $data_nascita;

        function __construct( $nome, $data_nascita ) {
            $this->nome = $nome;
            $this->data_nascita = $data_nascita;
        }

        public function getNome() {
            return $this->nome;
        }

        public function getDataNascita() {
            return $this->data_nascita;
        }

        public function getEta() {
            $data_nascita = new DateTime( $this->data_nascita );
            $oggi = new DateTime();
            $eta = $oggi->diff( $data_nascita );
            return $eta->y;
        }

    }

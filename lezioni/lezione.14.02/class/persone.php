<?php

    class Persone {

        public $nome;
        public $data_nascita;

        function __construct( $nome, $data_nascita ) {
            $this->nome = $nome;
            $this->data_nascita = $data_nascita;
        }

        function getEta() {
            $nascita = new DateTime( $this->data_nascita );
            $oggi = new DateTime();
            $differenza = $oggi->diff( $nascita );
            return $differenza->y;
        }

    }

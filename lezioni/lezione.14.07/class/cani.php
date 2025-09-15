<?php

    class Cani extends Animali {

        public $specie;
        public $razza;

        function __construct( $nome, $data_nascita, $razza ) {
            parent::__construct( $nome, $data_nascita );
            $this->specie = 'cane';
            $this->razza = $razza;
        }

    }

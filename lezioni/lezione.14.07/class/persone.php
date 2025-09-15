<?php

    class Persone extends Animali {

        public $specie;

        function __construct( $nome, $data_nascita ) {
            parent::__construct( $nome, $data_nascita );
            $this->specie = 'umano';
        }

    }
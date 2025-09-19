<?php

    class mParcheggio {

        public $nome;
        public $soste;
        public $tariffa;

        public function __construct( $nome, $tariffa ) {
            $this->nome = $nome;
            $this->soste = new cSosta();
            $this->tariffa = $tariffa;
        }

    }
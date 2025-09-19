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

        public function iniziaSosta( $auto ) {
            $this->soste->iniziaSosta( $auto );
        }

        public function terminaSosta( $auto, $fine ) {
            $this->soste->terminaSosta( $auto, $fine );
        }

    }
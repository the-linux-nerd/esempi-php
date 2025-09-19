<?php

    class cSosta {

        public $lista;

        public function __construct() {
            $this->lista = [];
        }

        public function aggiungiSosta( $sosta ) {
            $key = md5( $sosta->auto->targa . $sosta->inizio );
            $this->lista[$key] = $sosta;
        }

        public function rimuoviSosta( $targa, $inizio ) {
            $key = md5( $targa . $inizio );
            if ( isset( $this->lista[$key] ) ) {
                unset( $this->lista[$key] );
            }
        }

    }
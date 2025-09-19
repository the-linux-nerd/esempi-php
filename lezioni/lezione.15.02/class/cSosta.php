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

        public function iniziaSosta( $auto ) {
            $sosta = new mSosta( $auto, date( 'Y-m-d H:i:s' ) );
            $this->aggiungiSosta( $sosta );
        }

        public function terminaSosta( $auto, $fine ) {
            foreach( $this->lista as $sosta ) {
                if ( $sosta->auto->targa == $auto->targa && $sosta->fine == null ) {
                    $sosta->fine = $fine;
                    break;
                }
            }
        }

    }
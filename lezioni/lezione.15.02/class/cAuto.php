<?php

    class cAuto {

        public $lista;

        public function __construct() {
            $this->lista = [];
        }

        public function aggiungiAuto( $auto ) {
            $key = md5( $auto->targa );
            $this->lista[$key] = $auto;
        }

        public function rimuoviAuto( $targa ) {
            $key = md5( $targa );
            if ( isset( $this->lista[$key] ) ) {
                unset( $this->lista[$key] );
            }
        }

        public function trovaAuto( $targa ) {
            $key = md5( $targa );
            if ( isset( $this->lista[$key] ) ) {
                return $this->lista[$key];
            }
            return null;
        }

    }

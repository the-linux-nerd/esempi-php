<?php

    class mSosta {

        public $inizio;
        public $fine;
        public $auto;

        public function __construct( $auto, $inizio = NULL, $fine = NULL ) {
            $this->inizio = $inizio;
            $this->fine = $fine;
            $this->auto = $auto;
        }

        public function durata() {
            if ( $this->inizio && $this->fine ) {
                $diff = strtotime( $this->fine ) - strtotime( $this->inizio );
                return $diff / 3600;
            }
            return 0;
        }

    }

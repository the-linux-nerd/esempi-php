<?php

    class mAuto {

        public $marca;
        public $modello;
        public $anno;
        public $targa;

        public function __construct( $marca, $modello, $anno, $targa ) {
            $this->marca = $marca;
            $this->modello = $modello;
            $this->anno = $anno;
            $this->targa = $targa;
        }

    }

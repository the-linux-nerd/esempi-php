<?php

    class vAuto {

        public function __construct() {
            // Costruttore vuoto
        }

        public function mostraListaAuto( $lista ) {
            foreach ( $lista as $auto ) {
                $this->mostraAuto( $auto );
            }
        }

        public function mostraAuto( $auto ) {
            echo 'Marca: ' . $auto->marca . '<br>';
            echo 'Modello: ' . $auto->modello . '<br>';
            echo 'Anno: ' . $auto->anno . '<br>';
            echo 'Targa: ' . $auto->targa . '<br><br>';
        }

        public function mostraFormAuto( $auto = null ) {
            echo '<form method="post" action="">';
            echo 'Marca: <input type="text" name="marca" value="' . ($auto ? $auto->marca : '') . '"><br>';
            echo 'Modello: <input type="text" name="modello" value="' . ($auto ? $auto->modello : '') . '"><br>';
            echo 'Anno: <input type="number" name="anno" value="' . ($auto ? $auto->anno : '') . '"><br>';
            echo 'Targa: <input type="text" name="targa" value="' . ($auto ? $auto->targa : '') . '"><br>';
            echo '<input type="submit" value="Aggiungi Auto">';
            echo '</form>';
        }

    }
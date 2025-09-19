<?php

    class vSosta {

        public function mostraListaSoste( $soste ) {
            echo "<h2>Lista Soste</h2>";
            foreach ( $soste as $sosta ) {
                $this->mostraSosta( $sosta );
            }
        }

        public function mostraSosta( $sosta ) {
            echo "<div>";
            echo "<h3>Sosta</h3>";
            echo "<p>Auto: " . $sosta->auto->marca . " " . $sosta->auto->modello . " (" . $sosta->auto->targa . ")</p>";
            echo "<p>Inizio: " . $sosta->inizio . "</p>";
            echo "<p>Fine: " . $sosta->fine . "</p>";
            echo "<p>Durata: " . $sosta->durata() . " ore</p>";
            echo "</div>";
        }

    }

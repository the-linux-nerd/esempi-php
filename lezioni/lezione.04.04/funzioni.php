<?php

    /**
     * DIPENDENZE
     */

    require_once( "output.php" );

    /**
     * FUNZIONI MATEMATICHE
     */

    function somma( $a, $b ) {
        return $a + $b;
    }

    function differenza( $a, $b ) {
        return $a - $b;
    }

    function prodotto( $a, $b ) {
        return $a * $b;
    }

    function divisione( $a, $b ) {
        return $a / $b;
    }

    function scriviSomma( $a, $b ) {
        scrivi( "Somma: " . somma( $a, $b ) );
    }

    function scriviDifferenza( $a, $b ) {
        scrivi( "Differenza: " . differenza( $a, $b ) );
    }

    function scriviProdotto( $a, $b ) {
        scrivi( "Prodotto: " . prodotto( $a, $b ) );
    }

    function scriviDivisione( $a, $b ) {
        scrivi( "Divisione: " . divisione( $a, $b ) );
    }

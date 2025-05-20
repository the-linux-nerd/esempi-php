<?php

    /**
     * LIBRERIE  
     */

    require( "output.php" );
    require( "funzioni.php" );

    /**
     * DICHIARAZIONE VARIABILI
     */

    $a = 6;
    $b = 3;

    include( "config.php" );

    /**
     * PROGRAMMA PRINCIPALE
     */

    scrivi( "Somma: " . somma( $a, $b ) );
    scrivi( "Differenza: " . differenza( $a, $b ) );
    scrivi( "Prodotto: " . prodotto( $a, $b ) );
    scrivi( "Divisione: " . divisione( $a, $b ) );

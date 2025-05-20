<?php

    /**
     * FUNZIONI
     */

    function ciaoMondo() {
        echo "Ciao Mondo!<br>";
    }

    function somma($a, $b) {
        echo "Somma " . ( $a + $b ) . "<br>";
    }

    function prodotto($a, $b) {
        return $a * $b;
    }

    /**
     * PROGRAMMA PRINCIPALE
     */

    ciaoMondo();
    for( $i = 0; $i < 3; $i++) {
        ciaoMondo();
    }

    somma(2, 3);

    echo "Prodotto " . prodotto(2, 3) . "<br>";

    $valore = 5;
    
    somma( $valore, prodotto(2, 3) );
    
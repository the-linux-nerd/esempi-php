<?php

    /**
     * FUNZIONI
     */

    function somma( $a, $b, &$s ) {
        $s = $a + $b;
    }

    /**
     * PROGRAMMA PRINCIPALE
     */

    $cippolippo = 0;

    somma( 2, 3, $cippolippo );

    echo "Somma: " . $cippolippo . "<br>";

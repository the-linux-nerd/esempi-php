<?php

    $a = array( 'a' => 1, 'b' => 2, 'c' => 3);

    if( $_GET['stampa'] == 1 ) {
        echo '<pre>';
        print_r($a);
        echo '</pre>';
    } else {
        echo '<pre>';
        echo print_r($a, true);
        echo '</pre>';
    }

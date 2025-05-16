<?php

    $a = array( 'a' => 1, 'b' => 2, 'c' => 3);

    foreach( $a as $v ) {
        echo $v . '<br>';
    }

    echo '<br>';

    foreach( $a as $k => $v ) {
        echo $k . ' => ' . $v . '<br>';
    }

    echo '<br>';

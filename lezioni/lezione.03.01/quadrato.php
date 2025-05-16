<?php

    echo '<table border="1">';

    for( $i = 0; $i < 3; $i++ ) {
        echo '<tr>';
        for( $j = 0; $j < 3; $j++ ) {
            echo '<td>';
            echo $i . ' ' . $j;
            echo '</td>';
        }
        echo '</tr>';
    }
    echo '</table>';

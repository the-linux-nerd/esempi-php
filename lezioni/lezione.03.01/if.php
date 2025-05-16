<?php

    if( $_GET['id'] == 1 ) {
        echo 'ID vale uno';
    }

    echo '<br>';

    if( $_GET['id'] % 2 ) {
        echo 'ID è dispari';
    } else {
        echo 'ID è pari';
    } 

    echo '<br>';

    if( $_GET['id'] < 10 ) {
        echo 'ID è minore di 10';
    } elseif( $_GET['id'] > 10 ) {
        echo 'ID è maggiore di 10';
    } else {
        echo 'ID è uguale a 10';
    }

<?php

    do {
        echo $_GET['id'];
        echo '<br>';
        $_GET['id']--;
    } while( $_GET['id'] > 0 );

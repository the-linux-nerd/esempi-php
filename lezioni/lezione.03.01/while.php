<?php

    while( $_GET['id'] > 0 ) {
        echo $_GET['id'];
        echo '<br>';
        $_GET['id']--;
    }

<?php

    switch( $_GET['id'] ) {
        case 1:
            echo 'ID vale uno';
            break;
        case 2:
            echo 'ID vale due';
            break;
        case 3:
            echo 'ID vale tre';
            break;
        default:
            echo 'ID non è uno, due o tre';
            break;
    }

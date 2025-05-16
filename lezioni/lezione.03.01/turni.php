<?php

    $turni = array(
        0 => array(
            'giorno' => 'Lunedì',
            'persona' => 'Mario',
        ),
        1 => array(
            'giorno' => 'Martedì',
            'persona' => 'Luigi',
        ),
        2 => array(
            'giorno' => 'Mercoledì',
            'persona' => 'Giovanni',
        ),
        3 => array(
            'giorno' => 'Giovedì',
            'persona' => 'Anna',
        ),
        4 => array(
            'giorno' => 'Venerdì',
            'persona' => 'Maria',
        ),
        5 => array(
            'giorno' => 'Sabato',
            'persona' => 'Marco',
        ),
        6 => array(
            'giorno' => 'Domenica',
            'persona' => 'Sara',
        )
    );

    if( isset($_POST['id']) ) {
        echo '<pre>';
        echo 'di ' . $turni[ $_POST['id'] ]['giorno'] . ' ';
        echo 'è di turno ' . $turni[ $_POST['id'] ]['persona'];
        echo '</pre>';
    } else {
        foreach( $turni as $turno ) {
            echo '<pre>';
            echo 'di ' . $turno['giorno'] . ' ';
            echo 'è di turno ' . $turno['persona'];
            echo '</pre>';
        }
    }
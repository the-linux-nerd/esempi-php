<?php

    require 'class/persone.php';

    $a = new Persone( 'Mario Rossi', '1980-05-15' );

    echo 'Nome: ' . $a->nome . '<br>';
    echo 'Data di nascita: ' . $a->data_nascita . '<br>';
    echo 'Età: ' . $a->getEta() . ' anni<br>';

    $b = new Persone( 'Luigi Bianchi', 'cippolippo' );

    echo 'Nome: ' . $b->nome . '<br>';
    echo 'Data di nascita: ' . $b->data_nascita . '<br>';
    echo 'Età: ' . $b->getEta() . ' anni<br>';

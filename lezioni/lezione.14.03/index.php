<?php

    require 'class/persone.php';

    $a = new Persone( 'Mario Rossi', '1980-05-15' );

    echo 'Nome: ' . $a->getNome() . '<br>';
    echo 'Data di nascita: ' . $a->getDataNascita() . '<br>';
    echo 'Età: ' . $a->getEta() . ' anni<br>';

    $b = new Persone( 'Luigi Bianchi', 'cippolippo' );

    echo 'Nome: ' . $b->getNome() . '<br>';
    echo 'Data di nascita: ' . $b->getDataNascita() . '<br>';
    $b->setDataNascita( '1990-01-01' );
    echo 'Data di nascita aggiornata: ' . $b->getDataNascita() . '<br>';
    echo 'Età: ' . $b->getEta() . ' anni<br>';

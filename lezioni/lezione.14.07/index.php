<?php

    require_once 'class/animali.php';
    require_once 'class/persone.php';
    require_once 'class/cani.php';

    $a = new Persone( 'Mario Rossi', '1980-05-15' );

    echo 'Nome: ' . $a->getNome() . '<br>';
    echo 'Data di nascita: ' . $a->getDataNascita() . '<br>';
    echo 'Età: ' . $a->getEta() . ' anni<br><br>';

    $b = new Cani( 'Fido', '2018-03-20', 'Labrador' );

    echo 'Nome: ' . $b->getNome() . '<br>';
    echo 'Data di nascita: ' . $b->getDataNascita() . '<br>';
    echo 'Età: ' . $b->getEta() . ' anni<br>';
    echo 'Razza: ' . $b->razza . '<br>';

<?php

    require 'class/persone.php';
    require 'class/docenti.php';

    $a = new Persone( 'Mario Rossi', '1980-05-15' );
    $d = new Docenti( 'Anna Verdi', '1975-03-20', 'Matematica' );
    
    echo 'Nome: ' . $a->getNome() . '<br>';
    echo 'Data di nascita: ' . $a->getDataNascita() . '<br>';
    echo 'Età: ' . $a->getEta() . ' anni<br><br>';

    echo 'Nome: ' . $d->getNome() . '<br>';
    echo 'Data di nascita: ' . $d->getDataNascita() . '<br>';
    echo 'Età: ' . $d->getEta() . ' anni<br>';
    echo 'Materia: ' . $d->getMateria() . '<br>';
 
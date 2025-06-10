<?php

    $persone = array(
        0 => array(
            'nome' => 'Mario',
            'cognome' => 'Rossi',
            'eta' => 30,
            'citta' => 'Roma'
        ),
        1 => array(
            'nome' => 'Luigi',
            'cognome' => 'Verdi',
            'eta' => 25,
            'citta' => 'Milano'
        ),
        2 => array(
            'nome' => 'Giovanni',
            'cognome' => 'Bianchi',
            'eta' => 35,
            'citta' => 'Napoli'
        )
    );

    $persona = $persone[ $_GET['id'] ];

    echo '<html>';
    echo '<head>';
    echo '<title>Persone</title>';
    echo '</head>';
    echo '<body>';
    echo '<h1>' .$persona['nome'].' '.$persona['cognome'].'</h1>';
    echo '<h2>' .$_SERVER['QUERY_STRING'].'</h2>';
    echo '<p>Età: ' .$persona['eta'].'</p>';
    echo '<p>Città: ' .$persone[ $_GET['id'] ]['citta'].'</p>';
    echo '<p>Città: ' .$persona['citta'].'</p>';
    echo '</body>';
    echo '</html>';

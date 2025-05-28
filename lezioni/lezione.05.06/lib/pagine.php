<?php

    // pagine
    $pagine = array(
        0 => array(
            'dati' => array(
                'titolo' => 'not found',
                'h1' => 'Pagina non trovata',
                'contenuto' => 'Pagina non trovata'
            ),
            'template' => 'index.html'
        ),
        1 => array(
            'dati' => array(
                'titolo' => 'selezione figure',
                'h1' => 'scegli una figura',
                'contenuto' => 'scegli la figura di cui calcolare l\'area'
            ),
            'template' => 'figure.html',
            'include' => array( 'after' => 'figure.php' )
        ),
        2 => array(
            'dati' => array(
                'titolo' => 'inserimento dati',
                'h1' => 'Hai scelto una figura',
                'contenuto' => 'Hai scelto una figura, ora inserisci i dati'
            ),
            'include' => array( 'before' => 'dati.php' )
        ),
        3 => array(
            'dati' => array(
                'titolo' => 'calcolo area',
                'h1' => 'Calcolo area',
                'contenuto' => 'Hai inserito i dati, ora calcoliamo l\'area'
            ),
            'template' => 'index.html',
            'include' => array( 'before' => 'calcolo.php' )
        ),
    );

    // se è richiesta una pagina specifica
    if( ! isset($_GET['pagina']) || ! array_key_exists($_GET['pagina'], $pagine)) {
        $_GET['pagina'] = 0;
    }

    // individuo la pagina richiesta
    $pagina = $pagine[$_GET['pagina']];

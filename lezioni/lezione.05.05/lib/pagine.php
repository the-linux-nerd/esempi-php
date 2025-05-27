<?php

    // pagine
    $pagine = array(
        0 => array(
            'titolo' => 'not found',
            'h1' => 'Pagina non trovata',
            'contenuto' => 'Pagina non trovata',
            'template' => 'index.html'
        ),
        1 => array(
            'titolo' => 'Pagina 1',
            'h1' => 'Prima pagina',
            'contenuto' => 'Contenuto della pagina 1',
            'template' => 'index.html'
        ),
        2 => array(
            'titolo' => 'Pagina 2',
            'h1' => 'Seconda pagina',
            'contenuto' => 'Contenuto della pagina 2',
            'template' => 'index.html',
            'include' => array( 'before' => 'calcolo.php' )
        ),
        3 => array(
            'titolo' => 'Pagina 3',
            'h1' => 'Hai scelto una figura',
            'contenuto' => 'Hai scelto una figura, ora calcoliamo la sua area',
            'include' => array( 'before' => 'area.php' )
        ),
        4 => array(
            'titolo' => 'selezione figure',
            'h1' => 'scegli una figura',
            'contenuto' => 'scegli la figura di cui calcolare l\'area',
            'template' => 'figure.html',
            'include' => array( 'after' => 'figure.php' )
        )
    );

    // se è richiesta una pagina specifica
    if( ! isset($_GET['pagina']) || ! array_key_exists($_GET['pagina'], $pagine)) {
        $_GET['pagina'] = 0;
    }

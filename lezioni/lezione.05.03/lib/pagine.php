<?php

    // pagine
    $pagine = array(
        0 => array(
            'titolo' => 'not found',
            'h1' => 'Pagina non trovata',
            'contenuto' => 'Pagina non trovata'
        ),
        1 => array(
            'titolo' => 'Pagina 1',
            'h1' => 'Prima pagina',
            'contenuto' => 'Contenuto della pagina 1'
        ),
        2 => array(
            'titolo' => 'Pagina 2',
            'h1' => 'Seconda pagina',
            'contenuto' => 'Contenuto della pagina 2'
        )
    );

    // se è richiesta una pagina specifica
    if( ! isset($_GET['pagina']) || ! array_key_exists($_GET['pagina'], $pagine)) {
        $_GET['pagina'] = 0;
    }

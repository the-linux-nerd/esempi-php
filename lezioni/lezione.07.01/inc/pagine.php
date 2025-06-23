<?php

    $pagine = array(
        'pippo' => array(
            'contenuto' => array(
                'titolo' => 'Pippo',
                'testo' => 'pagina di Pippo',
            ),
            'template' => 'tpl/main.html',
        ),
        'pluto' => array(
            'contenuto' => array(
                'titolo' => 'Pluto',
                'testo' => 'pagina di Pluto',
            ),
            'template' => 'tpl/main.html',
        ),
        'paperino' => array(
            'contenuto' => array(
                'titolo' => 'Paperino',
                'testo' => 'pagina di Paperino',
            ),
            'template' => 'tpl/tabella.html',
        ),
        'default' => array(
            'contenuto' => array(
                'titolo' => 'Benvenuto',
                'testo' => 'pagina di benvenuto',
            ),
            'template' => 'tpl/main.html',
        ),
    );

    if (!isset($_REQUEST['p']) || !isset($pagine[$_REQUEST['p']])) {
        $_REQUEST['p'] = 'default';
    }

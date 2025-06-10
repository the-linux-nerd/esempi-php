<?php

    /**
     * qui sono dichiarate le pagine e le logiche valide per tutte le pagine
     */

    $pagine = array(
        'index' => array(
            'contenuto' => array(
                'titolo' => 'lista persone',
                'h1' => 'rubrica',
                'testo' => '',
            ),
            'template' => 'tpl/main.html',
            'include' => 'inc/lista.php',
        ),
        'gestione' => array(
            'contenuto' => array(
                'titolo' => 'gestione persone',
                'h1' => 'gestione',
                'testo' => '',
            ),
            'template' => 'tpl/main.html',
            'include' => 'inc/gestione.php',
        ),
    );

    if (!isset($_REQUEST['p']) || !isset($pagine[$_REQUEST['p']])) {
        $_REQUEST['p'] = 'index';
    }

    $p = $pagine[$_REQUEST['p']];

    $voci = [];
    foreach ($pagine as $key => $value) {
        $voci[] = HTML\tag(
            'a',
            [ 'href' => './' . $key . '.html' ],
            $value['contenuto']['titolo']
        );
    }

    $p['contenuto']['menu'] = HTML\tag( 'p', [], implode( ' | ', $voci ) );

<?php

    /**
     * qui sono dichiarate le pagine e le logiche valide per tutte le pagine
     */

    $pagine = array(
        'lista-cani' => array(
            'contenuto' => array(
                'titolo' => 'lista cani',
                'h1' => 'lista cani',
                'testo' => '',
            ),
            'template' => 'tpl/main.html',
            'include' => [ 'lib/cani.php', 'inc/cani.lista.php' ],
        ),
        'gestione-cani' => array(
            'contenuto' => array(
                'titolo' => 'gestione cani',
                'h1' => 'gestione cani',
                'testo' => '',
            ),
            'template' => 'tpl/main.html',
            'include' => [ 'lib/cani.php', 'inc/cani.gestione.php' ],
        ),
    );

    if (!isset($_REQUEST['p']) || !isset($pagine[$_REQUEST['p']])) {
        $_REQUEST['p'] = 'lista-cani';
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

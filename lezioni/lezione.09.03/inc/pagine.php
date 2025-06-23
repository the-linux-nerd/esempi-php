<?php

    /**
     * elenco delle pagine disponibili
     */
    $pagine = array(
        'lista-cani' => array(
            'contenuto' => array(
                'titolo' => 'lista cani',
                'h1' => 'lista cani',
                'testo' => '',
            ),
            'template' => 'tpl/main.html',
            'include' => [
                'mod/persone.lib.php',
                'mod/cani.lib.php',
                'mod/cani.mod.php',
                'mod/cani.tpl.php'
            ],
        ),
        'lista-persone' => array(
            'contenuto' => array(
                'titolo' => 'lista persone',
                'h1' => 'lista persone',
                'testo' => '',
            ),
            'template' => 'tpl/main.html',
            'include' => [
                'mod/persone.lib.php',
                'mod/persone.mod.php',
                'mod/persone.tpl.php'
            ],
        ),
    );

    /**
     * pagina di default
     */
    if (!isset($_REQUEST['p']) || !isset($pagine[$_REQUEST['p']])) {
        $_REQUEST['p'] = 'lista-cani';
    }

    /**
     * scorciatoia per la pagina richiesta
     */
    $p = $pagine[$_REQUEST['p']];

    /**
     * menu di navigazione
     */
    $voci = [];
    foreach ($pagine as $key => $value) {
        $voci[] = HTML\tag(
            'a',
            [ 'href' => './' . $key . '.html' ],
            $value['contenuto']['titolo']
        );
    }

    $p['contenuto']['menu'] = HTML\tag( 'p', [], implode( ' | ', $voci ) );

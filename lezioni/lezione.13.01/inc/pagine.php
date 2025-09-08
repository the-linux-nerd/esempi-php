<?php

    /**
     * elenco delle pagine disponibili
     */
    $pagine = array(
        'lista-persone' => array(
            'contenuto' => array(
                'titolo' => 'lista persone',
                'h1' => 'lista persone'
            ),
            'template' => 'tpl/main.html',
            'include' => [
                'opt/persone.modl.php',
                'opt/persone.ctrl.php',
                'opt/persone.view.php'
            ],
        ),
        'lista-cani' => array(
            'contenuto' => array(
                'titolo' => 'lista cani',
                'h1' => 'lista cani'
            ),
            'template' => 'tpl/main.html',
            'include' => [
                'opt/cani.modl.php',
                'opt/cani.ctrl.php',
                'opt/cani.view.php'
            ]
        )
    );

    /**
     * pagina di default
     */
    if (!isset($_REQUEST['p']) || !isset($pagine[$_REQUEST['p']])) {
        $_REQUEST['p'] = 'lista-persone';
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
        $voci[] = Render\render(
            'tpl/menu.voce.html',
            [
                'url' => './' . $key . '.html',
                'label' => $value['contenuto']['titolo']
            ]
        );
    }

    $p['contenuto']['menu'] = Render\render(
        'tpl/menu.html',
        [
            'voci' => implode( $voci )
        ]
    );

<?php

    $pagine = array(
        'lista-persone' => array(
            'contenuto' => array(
                'titolo' => 'lista persone',
                'h1' => 'lista persone'
            ),
            'template' => 'persone.twig',
            'include' => [
            ],
        ),
        'lista-cani' => array(
            'contenuto' => array(
                'titolo' => 'lista cani',
                'h1' => 'lista cani'
            ),
            'template' => 'cani.twig',
            'include' => [
            ]
        )
    );

    if ( !isset( $_REQUEST['p'] ) || !isset( $pagine[ $_REQUEST['p'] ] ) ) {
        $_REQUEST['p'] = 'lista-persone';
    }

    $p = $pagine[ $_REQUEST['p'] ];

    foreach ($pagine as $key => $value) {
        $p['contenuto']['menu'][] = array(
            'url' => './' . $key . '.html',
            'label' => $value['contenuto']['titolo']
        );
    }

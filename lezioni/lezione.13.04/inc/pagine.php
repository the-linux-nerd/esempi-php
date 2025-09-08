<?php

    $pagine = 

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

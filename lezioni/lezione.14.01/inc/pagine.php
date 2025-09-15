<?php

    if ( !isset( $_REQUEST['p'] ) || $_REQUEST['p'] == 'index' ) {
        $_REQUEST['p'] = 'lista-persone';
    }

    $pagine = Pagine\lista();

    foreach ($pagine as $key => $value) {
        if( $value['url'] == $_REQUEST['p'] ) {
            $p = $pagine[ $key ];
        }
    }

    foreach ($pagine as $key => $value) {
        $p['contenuto']['menu'][] = array(
            'url' => './' . $value['url'] . '.html',
            'label' => $value['contenuto']['titolo']
        );
    }


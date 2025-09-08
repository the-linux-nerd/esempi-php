<?php

    if ( !isset( $_REQUEST['p'] ) || $_REQUEST['p'] == 'index' ) {
        $_REQUEST['p'] = 'lista-persone';
    }

    $sql = "SELECT * FROM pagine";
    $stmt = mysqli_prepare( \DB\getConnection(), $sql );
    $exec = mysqli_stmt_execute( $stmt );
    $res = mysqli_stmt_get_result( $stmt );
    $pagine = mysqli_fetch_all( $res, MYSQLI_ASSOC );

    foreach ($pagine as $key => $value) {
        $pagine[ $key ]['contenuto'] = json_decode( $value['contenuto'], true ) ?? [];
        $pagine[ $key ]['include'] = json_decode( $value['include'], true ) ?? [];
        $pagine[ $key ]['contenuto']['menu'] = [];
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


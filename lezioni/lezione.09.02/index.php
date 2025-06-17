<?php

    // debug
    ini_set('display_errors', true);

    // librerie e moduli
    require_once 'lib/render.php';
    require_once 'lib/html.php';
    require_once 'inc/pagine.php';

    // inclusioni specifiche
    if( isset($p['include']) ) {
        foreach ($p['include'] as $include) {
            require_once $include;
        }
    }

    // render della pagina
    echo Render\render(
        $p['template'],
        $p['contenuto']
    );

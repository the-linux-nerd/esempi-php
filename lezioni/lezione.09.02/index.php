<?php

    ini_set('display_errors', true);

    require_once 'lib/render.php';
    require_once 'lib/html.php';
    require_once 'inc/pagine.php';

    if( isset($p['include']) ) {
        foreach ($p['include'] as $include) {
            require_once $include;
        }
    }

    echo Render\render(
        $p['template'],
        $p['contenuto']
    );

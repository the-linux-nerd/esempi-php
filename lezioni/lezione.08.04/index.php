<?php

    require_once 'lib/render.php';
    require_once 'lib/html.php';
    require_once 'lib/rubrica.php';
    require_once 'inc/pagine.php';

    if( isset($p['include']) ) {
        require_once $p['include'];
    }

    echo Render\render(
        $p['template'],
        $p['contenuto']
    );

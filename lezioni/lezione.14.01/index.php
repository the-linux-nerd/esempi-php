<?php

    require_once 'lib/ext/autoload.php';
    require_once 'mod/pagine.php';

    foreach (glob("lib/*.php") as $file) {
        require_once $file;
    }

    foreach (glob("conf/*.php") as $file) {
        require_once $file;
    }

    foreach (glob("inc/*.php") as $file) {
        require_once $file;
    }

    foreach( $p['include'] as $file ) {
        require_once $file;
    }

    echo Render\render(
        $p['template'],
        $p['contenuto']
    );

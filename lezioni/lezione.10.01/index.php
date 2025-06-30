<?php

    foreach (glob("lib/*.php") as $file) {
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
        [
            'titolo' => $p['contenuto']['titolo'],
            'h1' => $p['contenuto']['h1'],
            'menu' => $p['contenuto']['menu'],
            'main' => $p['contenuto']['main'] ?? '',
            'footer' => $p['contenuto']['footer'] ?? ''
        ]
    );

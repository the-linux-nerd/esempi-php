<?php

    require_once 'lib/render.php';

    require_once 'inc/pagine.php';

    echo render(
        $pagine[$_REQUEST['p']]['template'],
        $pagine[$_REQUEST['p']]['contenuto']
    );

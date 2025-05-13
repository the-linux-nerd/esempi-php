<?php

    echo '<html>';
    echo '<head>';
    echo '<title>GET</title>';
    echo '</head>';
    echo '<body>';
    echo '<h1>GET '.$_SERVER['QUERY_STRING'].'</h1>';
    echo '<pre>'.print_r($_GET,true).'</pre>';
    echo '</body>';
    echo '</html>';

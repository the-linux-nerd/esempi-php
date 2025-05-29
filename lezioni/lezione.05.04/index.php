<?php

    // librerie
    require_once 'lib/visualizzazione.php';
    require_once 'lib/pagine.php';

    // individuo la pagina richiesta
    $pagina = $pagine[$_GET['pagina']];

    // faccio il parsing del template
    $output = renderizza('tpl/index.html', $pagina);
    $output = creaMenu('{{menu}}', $pagine, $output);

    // rappresento il template
    echo $output;

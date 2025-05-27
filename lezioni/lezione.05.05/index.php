<?php

    // librerie
    require_once 'lib/visualizzazione.php';
    require_once 'lib/pagine.php';

    // individuo la pagina richiesta
    $pagina = $pagine[$_GET['pagina']];

    // inclusioni specifiche di pagina
    if( isset($pagina['include']['before']) ) {
        require_once 'lib/' . $pagina['include']['before'];
    }

    // faccio il parsing del template
    $output = renderizza('tpl/'.$pagina['template'], $pagina);
    $output = creaMenu('{{menu}}', $pagine, $output);

    // inclusioni specifiche di pagina
    if( isset($pagina['include']['after']) ) {
        require_once 'lib/' . $pagina['include']['after'];
    }

    // rappresento il template
    echo $output;

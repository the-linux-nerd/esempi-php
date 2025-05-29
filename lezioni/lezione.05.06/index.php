<?php

    // librerie
    require_once 'lib/visualizzazione.php';
    require_once 'lib/pagine.php';

    // inclusioni specifiche di pagina
    if( isset($pagina['include']['before']) ) {
        require_once 'inc/' . $pagina['include']['before'];
    }

    // faccio il parsing del template
    $output = renderizza('tpl/'.$pagina['template'], $pagina['dati']);
    $output = creaMenu('{{menu}}', $pagine, $output);

    // inclusioni specifiche di pagina
    if( isset($pagina['include']['after']) ) {
        require_once 'inc/' . $pagina['include']['after'];
    }

    // rappresento il template
    echo $output;

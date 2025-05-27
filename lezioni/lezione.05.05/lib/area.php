<?php

    // seleziono il template in base al tipo di figura
    switch ($_POST['figure']) {
        case 1:
            $pagina['h1'] = 'Hai scelto un triangolo';
            $pagina['template'] = 'triangolo.html';
            break;
        case 2:
            $pagina['h1'] = 'Hai scelto un rettangolo';
            $pagina['template'] = 'rettangolo.html';
            break;
        case 3:
            $pagina['h1'] = 'Hai scelto un cerchio';
            $pagina['template'] = 'cerchio.html';
            break;
        default:
            $pagina['h1'] = 'Non hai scelto una figura valida';
            $pagina['template'] = 'index.html';
            break;
    }

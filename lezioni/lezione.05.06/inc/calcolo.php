<?php

    switch( $_POST['figura'] ) {
        case '1':
            $pagina['h1'] = 'calcolo area triangolo';
            $base = $_POST['base'];
            $altezza = $_POST['altezza'];
            $pagina['contenuto'] = 'il risultato è ' . ($base * $altezza) / 2;
            break;
        case '2':
            $pagina['h1'] = 'calcolo area rettangolo';
            $base = $_POST['base'];
            $altezza = $_POST['altezza'];
            $pagina['contenuto'] = 'il risultato è ' . ($base * $altezza);
            break;
        case '3':
            $pagina['h1'] = 'calcolo area cerchio';
            $raggio = $_POST['raggio'];
            $pagina['contenuto'] = 'il risultato è ' . (pi() * pow($raggio, 2));
            break;
        default:
            $pagina['h1'] = 'calcolo area';
            $pagina['contenuto'] = 'non hai scelto una figura valida';
            break;
    }
    
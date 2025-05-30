<?php

    $pagina = array(
        'dati' => array(
            'titolo' => 'calcolo area',
            'h1' => 'Calcolo area',
            'contenuto' => 'Hai inserito i dati, ora calcoliamo l\'area'
        ),
        'template' => 'tpl/risultati.html'
    );

    switch( $_POST['figura'] ) {
        case '1':
            $pagina['dati']['h1'] = 'calcolo area triangolo';
            $base = $_POST['base'];
            $altezza = $_POST['altezza'];
            $pagina['dati']['contenuto'] = 'il risultato è ' . ($base * $altezza) / 2;
            break;
        case '2':
            $pagina['dati']['h1'] = 'calcolo area rettangolo';
            $base = $_POST['base'];
            $altezza = $_POST['altezza'];
            $pagina['dati']['contenuto'] = 'il risultato è ' . ($base * $altezza);
            break;
        case '3':
            $pagina['dati']['h1'] = 'calcolo area cerchio';
            $raggio = $_POST['raggio'];
            $pagina['dati']['contenuto'] = 'il risultato è ' . (pi() * pow($raggio, 2));
            break;
        default:
            $pagina['dati']['h1'] = 'calcolo area';
            $pagina['dati']['contenuto'] = 'non hai scelto una figura valida';
            break;
    }

    $contenuto = file_get_contents($pagina['template']);

    foreach ($pagina['dati'] as $key => $value) {
        $contenuto = str_replace('{{' . $key . '}}', $value, $contenuto); 
    }

    echo $contenuto;
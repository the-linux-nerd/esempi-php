<?php

    $pagina = array(
        'dati' => array(
            'titolo' => 'inserimento dati',
            'h1' => 'Hai scelto una figura',
            'contenuto' => 'Hai scelto una figura, ora inserisci i dati',
            'template' => 'tpl/dati.html'
        )
    );

    $contenuto = file_get_contents($pagina['dati']['template']);

    foreach ($pagina['dati'] as $key => $value) {
        $contenuto = str_replace('{{' . $key . '}}', $value, $contenuto); 
    }

    switch( $_POST['figure'] ) {
        case '1':
            $pagina['dati']['h1'] = 'calcolo area triangolo';
            $form = array(
                0 => array(
                    'type' => 'text',
                    'name' => 'base',
                    'placeholder' => 'inserisci la base'
                ),
                1 => array(
                    'type' => 'text',
                    'name' => 'altezza',
                    'placeholder' => 'inserisci l\'altezza'
                ),
                2 => array(
                    'type' => 'hidden',
                    'name' => 'figura',
                    'value' => '1'
                )
            );
            break;
        case '2':
            $pagina['dati']['h1'] = 'calcolo area rettangolo';
            $form = array(
                0 => array(
                    'type' => 'text',
                    'name' => 'base',
                    'placeholder' => 'inserisci la base'
                ),
                1 => array(
                    'type' => 'text',
                    'name' => 'altezza',
                    'placeholder' => 'inserisci l\'altezza'
                ),
                2 => array(
                    'type' => 'hidden',
                    'name' => 'figura',
                    'value' => '2'
                )
            );
            break;
        case '3':
            $pagina['dati']['h1'] = 'calcolo area cerchio';
            $form = array(
                0 => array(
                    'type' => 'text',
                    'name' => 'raggio',
                    'placeholder' => 'inserisci il raggio'
                ),
                1 => array(
                    'type' => 'hidden',
                    'name' => 'figura',
                    'value' => '3'
                )
            );
            break;
        default:
            $pagina['dati']['h1'] = 'calcolo area';
            $pagina['dati']['contenuto'] = 'non hai scelto una figura valida';
            $form = array();
            break;
    }

    $formFigure = '';
    foreach ($form as $input) {
        $formFigure .= '<input type="' . $input['type'] . '" name="' . $input['name'] . '" placeholder="' . $input['placeholder'] . '"';
        if (isset($input['value'])) {
            $formFigure .= ' value="' . $input['value'] . '"';
        }
        $formFigure .= '>';
    }

    $contenuto = str_replace('{{formFigure}}', $formFigure, $contenuto);

    echo $contenuto;

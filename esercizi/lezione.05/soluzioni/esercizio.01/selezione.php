<?php

    $pagina = array(
        'dati' => array(
            'titolo' => 'selezione figure',
            'h1' => 'scegli una figura',
            'contenuto' => 'scegli la figura di cui calcolare l\'area'
        ),
        'template' => 'tpl/selezione.html'
    );

    $contenuto = file_get_contents($pagina['template']);

    foreach ($pagina['dati'] as $key => $value) {
        $contenuto = str_replace('{{' . $key . '}}', $value, $contenuto); 
    }

    $form = array(
        'options' => array(
            '1' => 'triangolo',
            '2' => 'rettangolo',
            '3' => 'cerchio'
        )
    );

    $select = '';
    foreach ($form['options'] as $key => $value) {
        $select .= '<option value="' . $key . '">' . $value . '</option>';
    }

    $contenuto = str_replace('{{selectFigure}}', $select, $contenuto);

    echo $contenuto;

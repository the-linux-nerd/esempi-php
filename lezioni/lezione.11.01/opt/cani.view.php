<?php

    $righe = [];
    foreach( Cani\lista() as $cane ) {
        $righe[] = Render\render(
            'tpl/cani.table.row.html',
            [
                'id' => $cane['id'],
                'nome' => $cane['nome'],
                'data_nascita' => $cane['data_nascita']
            ]
        );
    }
    
    $lista = Render\render(
        'tpl/cani.table.html',
        [
            'lista' => implode('', $righe),
        ]
    );

    $form = Render\render(
        'tpl/cani.form.html',
        [
            'azione' => ( $_REQUEST['cani']['azione'] == 'modifica' ) ? 'modifica' : 'aggiungi',
            'id' => $_REQUEST['cani']['id'] ?? '',
            'nome' => $_REQUEST['cani']['nome'] ?? '',
            'data_nascita' => $_REQUEST['cani']['data_nascita'] ?? ''
        ]
    );

    $p['contenuto']['main'] = $lista . $form;

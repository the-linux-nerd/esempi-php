<?php

    $righe = [];
    foreach( Persone\lista() as $persona ) {
        $righe[] = Render\render(
            'tpl/persone.table.row.html',
            [
                'id' => $persona['id'],
                'nome' => $persona['nome'],
                'numero' => $persona['numero']
            ]
        );
    }
    
    $lista = Render\render(
        'tpl/persone.table.html',
        [
            'lista' => implode('', $righe),
        ]
    );

    $form = Render\render(
        'tpl/persone.form.html',
        [
            'azione' => ( $_REQUEST['azione'] == 'modifica' ) ? 'modifica' : 'aggiungi',
            'id' => $_REQUEST['id'] ?? '',
            'nome' => $_REQUEST['nome'] ?? '',
            'numero' => $_REQUEST['numero'] ?? ''
        ]
    );

    $p['contenuto']['main'] = $lista . $form;

<?php

    /**
     * qui vanno le logiche per la visualizzazione della lista delle persone
     */

    $rubrica = Rubrica\lista();

    $righe = [];
    foreach ($rubrica as $id => $persona) {
        $campi = [];
        $campi[] = HTML\tag('td', [], $id);
        $campi[] = HTML\tag('td', [], $persona['nome']);
        $campi[] = HTML\tag('td', [], $persona['telefono']);
        $campi[] = HTML\tag('td', [],
            HTML\tag(
                'a',
                [ 'href' => './index.html?id=' . $id ],
                'modifica'
            )
        );            
        $campi[] = HTML\tag('td', [],
            HTML\tag(
                'a',
                [ 'href' => './gestione.html?elimina=' . $id ],
                'elimina'
            )
        );
        $righe[] = HTML\tag('tr', [], implode('', $campi));
    } 

    $p['contenuto']['testo'] = HTML\tag('table', [ 'border' => 1 ], implode('', $righe));

    $p['contenuto']['testo'] .= HTML\tag('hr');

    if( isset($_REQUEST['id']) && isset($rubrica[$_REQUEST['id']]) ) {
        $persona = $rubrica[ $_REQUEST['id'] ];
        $idField = [
            'field' => 'input',
            'type' => 'hidden',
            'name' => 'id',
            'value' => $_REQUEST['id']
        ];
    } else {
        $persona = [];
        $idField = [];
    }

    $p['contenuto']['testo'] .= HTML\form(
        [ 'action' => './gestione.html', 'method' => 'post' ],
        [
            'id' => $idField,
            'nome' => [     'field' => 'input', 'type' => 'text',   'name' => 'nome',       'required' => '',   'placeholder' => 'nome',        'value' => ( isset($persona['nome']) ? $persona['nome'] : '' ) ],
            'telefono' => [ 'field' => 'input', 'type' => 'text',   'name' => 'telefono',   'required' => '',   'placeholder' => 'telefono',    'value' => ( isset($persona['telefono']) ? $persona['telefono'] : '' ) ],
            'salva' => [    'field' => 'input', 'type' => 'submit', 'name' => 'salva',      'value' => 'salva' ],
        ]
    );

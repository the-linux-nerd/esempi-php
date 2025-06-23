<?php

    /**
     * composizione della tabella
     */
    $righe = [];
    foreach ($cani as $id => $cane) {
        $campi = [];
        $campi[] = HTML\tag('td', [], $cane['nome']);
        $campi[] = HTML\tag('td', [], $cane['anno_nascita']);
        $campi[] = HTML\tag('td', [], Persone\get($cane['padrone'])['nome']); 

        $campi[] = HTML\tag('td', [],
            HTML\tag(
                'a',
                [ 'href' => './lista-cani.html?id=' . $id ],
                'modifica'
            )
        );            
        $campi[] = HTML\tag('td', [],
            HTML\tag(
                'a',
                [ 'href' => './lista-cani.html?elimina=' . $id ],
                'elimina'
            )
        );
        $righe[] = HTML\tag('tr', [], implode('', $campi));
    } 

    $p['contenuto']['testo'] = HTML\tag('table', [ 'border' => 1 ], implode('', $righe));

    /**
     * separatore
     */
    $p['contenuto']['testo'] .= HTML\tag('hr');

    /**
     * composizione del form
     */
    if( isset($_REQUEST['id']) && isset($cani[$_REQUEST['id']]) ) {
        $cane = $cani[ $_REQUEST['id'] ];
        $idField = [
            'field' => 'input',
            'type' => 'hidden',
            'name' => 'id',
            'value' => $_REQUEST['id']
        ];
    } else {
        $cane = [];
        $idField = [];
    }

    $p['contenuto']['testo'] .= HTML\form(
        [ 'action' => './lista-cani.html', 'method' => 'post' ],
        [
            'id' => $idField,
            'nome' => [
                'field' => 'input',
                'type' => 'text',
                'name' => 'nome',
                'required' => '',
                'placeholder' => 'nome',
                'value' => ( isset($cane['nome']) ? $cane['nome'] : '' ) ],
            'anno_nascita' => [
                'field' => 'input',
                'type' => 'text',
                'name' => 'anno_nascita',
                'required' => '',
                'placeholder' => 'anno nascita',
                'value' => ( isset($cane['anno_nascita']) ? $cane['anno_nascita'] : '' ) ],
            'padrone' => [
                'field' => 'select',
                'name' => 'padrone',
                'options' => Persone\lista(),
                'value' => ( isset($cane['padrone']) ? $cane['padrone'] : '' ),
                'placeholder' => 'seleziona il padrone'
            ],
            'salva' => [
                'field' => 'input',
                'type' => 'submit',
                'name' => 'salva',
                'value' => 'salva' ],
        ]
    );

<?php

    /**
     * qui vanno le logiche per la visualizzazione della lista delle persone
     */

    $rubrica = Rubrica\lista();

    $righe = [];
    foreach ($rubrica as $persona) {
        $campi = [];
        $campi[] = HTML\tag('td', [], $persona['nome']);
        $campi[] = HTML\tag('td', [], $persona['telefono']);
        $righe[] = HTML\tag('tr', [], implode('', $campi));
    } 

    $p['contenuto']['testo'] = HTML\tag('table', [ 'border' => 1 ], implode('', $righe));

    $p['contenuto']['testo'] .= HTML\tag('hr');

    $p['contenuto']['testo'] .= HTML\form(
        [ 'action' => './gestione.html', 'method' => 'post' ],
        [
            'nome' => [     'field' => 'input', 'type' => 'text',   'name' => 'nome',       'required' => '',   'placeholder' => 'nome' ],
            'telefono' => [ 'field' => 'input', 'type' => 'text',   'name' => 'telefono',   'required' => '',   'placeholder' => 'telefono' ],
            'salva' => [    'field' => 'input', 'type' => 'submit', 'name' => 'salva',      'value' => 'salva' ],
        ]
    );

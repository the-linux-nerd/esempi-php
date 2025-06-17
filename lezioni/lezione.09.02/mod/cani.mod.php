<?php

    /**
     * gestore dei cani
     */

    /**
     * modifica, inserimento e cancellazione
     */
    if (isset($_REQUEST['nome']) && isset($_REQUEST['anno_nascita']) && isset($_REQUEST['id'])) {
        if ($_REQUEST['nome'] != '' && $_REQUEST['anno_nascita'] != '') {
            $p['contenuto']['testo'] = 'modifico ' . $_REQUEST['nome'] . ' con anno nascita ' . $_REQUEST['anno_nascita'];
            $r = Cani\modifica($_REQUEST['id'], $_REQUEST['nome'], $_REQUEST['anno_nascita']);
            if ($r) {
                $p['contenuto']['testo'] .= ' - modifica riuscita';
            } else {
                $p['contenuto']['testo'] .= ' - modifica fallita';
            }
        } else {
            $p['contenuto']['testo'] = 'modifica fallita: nome o anno nascita non validi';
        }
    } elseif (isset($_REQUEST['nome']) && isset($_REQUEST['anno_nascita'])) {
        if ($_REQUEST['nome'] != '' && $_REQUEST['anno_nascita'] != '') {
            $p['contenuto']['testo'] = 'aggiungo ' . $_REQUEST['nome'] . ' con anno nascita ' . $_REQUEST['anno_nascita'];
            $r = Cani\aggiungi($_REQUEST['nome'], $_REQUEST['anno_nascita']);
            if ($r) {
                $p['contenuto']['testo'] .= ' - aggiunta riuscita';
            } else {
                $p['contenuto']['testo'] .= ' - aggiunta fallita';
            }
        } else {
            $p['contenuto']['testo'] = 'aggiunta fallita: nome o anno nascita non validi';
        }
    } elseif (isset($_REQUEST['elimina'])) {
        if( ! empty($_REQUEST['elimina']) ) {
            $r = Cani\elimina($_REQUEST['elimina']);
            $p['contenuto']['testo'] = 'eliminazione di ' . $_REQUEST['elimina'] . ' in corso...';
            if ($r) {
                $p['contenuto']['testo'] .= ' eliminazione riuscita';
            } else {
                $p['contenuto']['testo'] .= ' eliminazione fallita';
            }
        } else {
            $p['contenuto']['testo'] = 'eliminazione fallita: id non valido';
        }
    }

    /**
     * elenco
     */
    $rubrica = Cani\lista();

    /**
     * composizione della tabella
     */
    $righe = [];
    foreach ($rubrica as $id => $cane) {
        $campi = [];
        $campi[] = HTML\tag('td', [], $cane['nome']);
        $campi[] = HTML\tag('td', [], $cane['anno_nascita']);
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
    if( isset($_REQUEST['id']) && isset($rubrica[$_REQUEST['id']]) ) {
        $cane = $rubrica[ $_REQUEST['id'] ];
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
            'salva' => [
                'field' => 'input',
                'type' => 'submit',
                'name' => 'salva',
                'value' => 'salva' ],
        ]
    );

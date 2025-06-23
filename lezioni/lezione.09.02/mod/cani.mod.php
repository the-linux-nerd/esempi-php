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

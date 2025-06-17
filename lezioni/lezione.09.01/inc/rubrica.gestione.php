<?php

    /**
     * qui vanno le logiche per salvare e cancellare le persone
     */

    if (isset($_REQUEST['nome']) && isset($_REQUEST['telefono']) && isset($_REQUEST['id'])) {
        if ($_REQUEST['nome'] != '' && $_REQUEST['telefono'] != '') {
            $p['contenuto']['testo'] = 'modifico ' . $_REQUEST['nome'] . ' con telefono ' . $_REQUEST['telefono'];
            $r = Rubrica\modifica($_REQUEST['id'], $_REQUEST['nome'], $_REQUEST['telefono']);
            if ($r) {
                $p['contenuto']['testo'] .= ' - modifica riuscita';
            } else {
                $p['contenuto']['testo'] .= ' - modifica fallita';
            }
        }
    } elseif (isset($_REQUEST['nome']) && isset($_REQUEST['telefono'])) {
        if ($_REQUEST['nome'] != '' && $_REQUEST['telefono'] != '') {
            $p['contenuto']['testo'] = 'aggiungo ' . $_REQUEST['nome'] . ' con telefono ' . $_REQUEST['telefono'];
            $r = Rubrica\aggiungi($_REQUEST['nome'], $_REQUEST['telefono']);
            if ($r) {
                $p['contenuto']['testo'] .= ' - aggiunta riuscita';
            } else {
                $p['contenuto']['testo'] .= ' - aggiunta fallita';
            }
        }
    } elseif (isset($_REQUEST['elimina'])) {
        if( ! empty($_REQUEST['elimina']) ) {
            $r = Rubrica\elimina($_REQUEST['elimina']);
            $p['contenuto']['testo'] = 'eliminazione di ' . $_REQUEST['elimina'] . ' in corso...';
            if ($r) {
                $p['contenuto']['testo'] .= ' eliminazione riuscita';
            } else {
                $p['contenuto']['testo'] .= ' eliminazione fallita';
            }
        }
    }

<?php

    /**
     * gestore delle persone
     */

    /**
     * modifica, inserimento e cancellazione
     */
    if (isset($_REQUEST['nome']) && isset($_REQUEST['telefono']) && isset($_REQUEST['id'])) {
        if ($_REQUEST['nome'] != '' && $_REQUEST['telefono'] != '') {
            $p['contenuto']['testo'] = 'modifico ' . $_REQUEST['nome'] . ' con telefono ' . $_REQUEST['telefono'];
            $r = Persone\modifica($_REQUEST['id'], $_REQUEST['nome'], $_REQUEST['telefono']);
            if ($r) {
                $p['contenuto']['testo'] .= ' - modifica riuscita';
            } else {
                $p['contenuto']['testo'] .= ' - modifica fallita';
            }
        } else {
            $p['contenuto']['testo'] = 'modifica fallita: nome o telefono non validi';
        }
    } elseif (isset($_REQUEST['nome']) && isset($_REQUEST['telefono'])) {
        if ($_REQUEST['nome'] != '' && $_REQUEST['telefono'] != '') {
            $p['contenuto']['testo'] = 'aggiungo ' . $_REQUEST['nome'] . ' con telefono ' . $_REQUEST['telefono'];
            $r = Persone\aggiungi($_REQUEST['nome'], $_REQUEST['telefono']);
            if ($r) {
                $p['contenuto']['testo'] .= ' - aggiunta riuscita';
            } else {
                $p['contenuto']['testo'] .= ' - aggiunta fallita';
            }
        } else {
            $p['contenuto']['testo'] = 'aggiunta fallita: nome o telefono non validi';
        }
    } elseif (isset($_REQUEST['elimina'])) {
        if( ! empty($_REQUEST['elimina']) ) {
            $r = Persone\elimina($_REQUEST['elimina']);
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
    $rubrica = Persone\lista();

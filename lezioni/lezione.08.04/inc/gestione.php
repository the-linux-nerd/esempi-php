<?php

    /**
     * qui vanno le logiche per salvare e cancellare le persone
     */

     if (isset($_REQUEST['nome']) && isset($_REQUEST['telefono'])) {
         if ($_REQUEST['nome'] != '' && $_REQUEST['telefono'] != '') {
            $p['contenuto']['testo'] = 'aggiungo ' . $_REQUEST['nome'] . ' con telefono ' . $_REQUEST['telefono'];
            $r = Rubrica\aggiungi($_REQUEST['nome'], $_REQUEST['telefono']);
            if ($r) {
                $p['contenuto']['testo'] .= ' - aggiunta riuscita';
            } else {
                $p['contenuto']['testo'] .= ' - aggiunta fallita';
            }
         }
     }
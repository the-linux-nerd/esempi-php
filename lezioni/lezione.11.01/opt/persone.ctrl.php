<?php

    switch( $_REQUEST['azione'] ) {
        case 'aggiungi':
            if (isset($_REQUEST['nome']) && isset($_REQUEST['numero'])) {
                $r = Persone\aggiungi($_REQUEST['nome'], $_REQUEST['numero']);
                if($r) {
                    $p['contenuto']['footer'] = "<p>aggiunta di ".$_REQUEST['nome']." con numero ".$_REQUEST['numero']."</p>";
                } else {
                    $p['contenuto']['footer'] = "<p>errore nell'aggiunta di ".$_REQUEST['nome']." con numero ".$_REQUEST['numero']."</p>";
                }
            }
            break;

        case 'modifica':
            if (isset($_REQUEST['id']) && isset($_REQUEST['nome']) && isset($_REQUEST['numero'])) {
                $r = Persone\modifica($_REQUEST['id'], $_REQUEST['nome'], $_REQUEST['numero']);
                if($r) {
                    $p['contenuto']['footer'] = "<p>modifica di id ".$_REQUEST['id']." riuscita</p>";
                } else {
                    $p['contenuto']['footer'] = "<p>errore nella modifica di id ".$_REQUEST['id']."</p>";
                }
            }
            if( isset($_REQUEST['id']) ) {
                $persona = Persone\dettagli($_REQUEST['id']);
                if(!empty($persona)) {
                    $_REQUEST['id'] = $persona['id'];
                    $_REQUEST['nome'] = $persona['nome'];
                    $_REQUEST['numero'] = $persona['numero'];
                } else {
                    $p['contenuto']['footer'] = "<p>errore nel recupero della persona con id ".$_REQUEST['id']."</p>";
                }
            }
            break;

        case 'elimina':
            if (isset($_REQUEST['id'])) {
                $r = Persone\elimina($_REQUEST['id']);
                if($r) {
                    $p['contenuto']['footer'] = "<p>eliminazione di id ".$_REQUEST['id']." riuscita</p>";
                } else {
                    $p['contenuto']['footer'] = "<p>errore nell'eliminazione di id ".$_REQUEST['id']."</p>";
                }
            }
            break;
    }

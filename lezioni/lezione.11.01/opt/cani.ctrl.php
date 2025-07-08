<?php

    switch( $_REQUEST['cani']['azione'] ) {
        case 'aggiungi':
            if (isset($_REQUEST['cani']['nome']) && isset($_REQUEST['cani']['data_nascita'])) {
                $r = Cani\aggiungi($_REQUEST['cani']['nome'], $_REQUEST['cani']['data_nascita']);
                if($r) {
                    $p['contenuto']['footer'] = "<p>aggiunta di ".$_REQUEST['cani']['nome']." con data di nascita ".$_REQUEST['cani']['data_nascita']."</p>";
                } else {
                    $p['contenuto']['footer'] = "<p>errore nell'aggiunta di ".$_REQUEST['cani']['nome']." con data di nascita ".$_REQUEST['cani']['data_nascita']."</p>";
                }
            }
            break;

        case 'modifica':
            if (isset($_REQUEST['cani']['id']) && isset($_REQUEST['cani']['nome']) && isset($_REQUEST['cani']['data_nascita'])) {
                $r = Cani\modifica($_REQUEST['cani']['id'], $_REQUEST['cani']['nome'], $_REQUEST['cani']['data_nascita']);
                if($r) {
                    $p['contenuto']['footer'] = "<p>modifica di id ".$_REQUEST['cani']['id']." riuscita</p>";
                } else {
                    $p['contenuto']['footer'] = "<p>errore nella modifica di id ".$_REQUEST['cani']['id']."</p>";
                }
            }
            if( isset($_REQUEST['cani']['id']) ) {
                $persona = Cani\dettagli($_REQUEST['cani']['id']);
                if(!empty($persona)) {
                    $_REQUEST['cani']['id'] = $persona['id'];
                    $_REQUEST['cani']['nome'] = $persona['nome'];
                    $_REQUEST['cani']['data_nascita'] = $persona['data_nascita'];
                } else {
                    $p['contenuto']['footer'] = "<p>errore nel recupero del cane con id ".$_REQUEST['cani']['id']."</p>";
                }
            }
            break;

        case 'elimina':
            if (isset($_REQUEST['cani']['id'])) {
                $r = Cani\elimina($_REQUEST['cani']['id']);
                if($r) {
                    $p['contenuto']['footer'] = "<p>eliminazione di id ".$_REQUEST['cani']['id']." riuscita</p>";
                } else {
                    $p['contenuto']['footer'] = "<p>errore nell'eliminazione di id ".$_REQUEST['cani']['id']."</p>";
                }
            }
            break;
    }

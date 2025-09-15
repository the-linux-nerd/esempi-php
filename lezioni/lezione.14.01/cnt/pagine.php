<?php

    /**
     * gestione dei cani
     * =================
     * 
     * Questo file contiene le logiche e le funzioni per la gestione dei cani.
     * 
     * 
     * 
     */

    // array per i dati da passare al template
    $p['contenuto']['dati'] = [];
    $p['contenuto']['dati']['status'] = 'nessuna operazione in corso';
    $p['contenuto']['dati']['lista_pagine'] = '';
    $p['contenuto']['dati']['id_pagina'] = '';
    $p['contenuto']['dati']['url_pagina'] = '';
    $p['contenuto']['dati']['template_pagina'] = '';
    $p['contenuto']['dati']['titolo_pagina'] = '';
    $p['contenuto']['dati']['h1_pagina'] = '';
    $p['contenuto']['dati']['include_pagina'] = '';

    /**
     * inserimento di una nuova pagina
     * 
     * 
     */
    if( isset($_POST['url']) && isset($_POST['template']) && isset( $_POST['titolo'] ) && isset( $_POST['h1'] ) && empty($_POST['id']) ) {
        $p['contenuto']['dati']['status'] = 'inserimento di una nuova pagina';
        $include = ( !empty($_POST['include']) ) ? explode( "\n", $_POST['include'] ) : [];
        if( \Pagine\aggiungi($_POST['url'], $_POST['template'], $_POST['titolo'], $_POST['h1'], $include) ) {
            $p['contenuto']['dati']['status'] = 'pagina aggiunta con successo';
        } else {
            $p['contenuto']['dati']['status'] = 'errore nell\'aggiunta della pagina';
        }
    }

    /**
     * eliminazione di una pagina
     * --------------------------
     * 
     * 
     */
    if( isset($_GET['elimina']) ) {
        $p['contenuto']['dati']['status'] = 'eliminazione di una pagina';
        if( \Pagine\elimina($_GET['elimina']) ) {
            $p['contenuto']['dati']['status'] = 'pagina eliminata con successo';
        } else {
            $p['contenuto']['dati']['status'] = 'errore nell\'eliminazione della pagina';
        }
    }

    /**
     * caricamento di una pagina per la modifica
     * -----------------------------------------
     * 
     * 
     */
    if( isset($_GET['modifica']) ) {
        $p['contenuto']['dati']['status'] = 'lettura dei dati della pagina da modificare';
        $pagina = \Pagine\dettagli($_GET['modifica']);
        if( !empty($pagina) ) {
            $p['contenuto']['dati']['id_pagina'] = $pagina['id'];
            $p['contenuto']['dati']['url_pagina'] = $pagina['url'];
            $p['contenuto']['dati']['template_pagina'] = $pagina['template'];
            $p['contenuto']['dati']['titolo_pagina'] = $pagina['contenuto']['titolo'] ?? '';
            $p['contenuto']['dati']['h1_pagina'] = $pagina['contenuto']['h1'] ?? '';
            $p['contenuto']['dati']['include_pagina'] = implode( "\n", $pagina['include'] );
            $p['contenuto']['dati']['status'] = 'pagina caricata con successo';
        } else {
            $p['contenuto']['dati']['status'] = 'errore nel recupero della pagina con id ' . $_GET['modifica'];
        }
    }

    /**
     * modifica di una pagina
     * ----------------------
     * 
     * 
     */
    if( isset($_POST['url']) && isset($_POST['template']) && !empty($_POST['id']) ) {
        $p['contenuto']['dati']['status'] = 'modifica di una pagina';
        if( !empty($_POST['include']) ) {
            $include = explode( "\n", $_POST['include'] );
        } else {
            $include = [];
        }
        if( \Pagine\modifica($_POST['id'], $_POST['url'], $_POST['template'], $_POST['titolo'], $_POST['h1'], $include) ) {
            $p['contenuto']['dati']['status'] = 'pagina modificata con successo';
        } else {
            $p['contenuto']['dati']['status'] = 'errore nella modifica della pagina';
        }
    }

    /**
     * caricamento lista pagine
     * ------------------------
     * 
     */
    $p['contenuto']['lista'] = \Pagine\lista();

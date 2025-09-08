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
    $p['contenuto']['dati']['lista_cani'] = '';
    $p['contenuto']['dati']['id_cane'] = '';
    $p['contenuto']['dati']['nome_cane'] = '';
    $p['contenuto']['dati']['data_nascita_cane'] = '';

    /**
     * inserimento di un nuovo cane
     * 
     * 
     */
    if( isset($_POST['nome']) && isset($_POST['data_nascita']) && empty($_POST['id']) ) {
        $p['contenuto']['dati']['status'] = 'inserimento di un nuovo cane';
        if( \Cani\aggiungi($_POST['nome'], $_POST['data_nascita']) ) {
            $p['contenuto']['dati']['status'] = 'cane aggiunto con successo';
        } else {
            $p['contenuto']['dati']['status'] = 'errore nell\'aggiunta del cane';
        }
    }

    /**
     * eliminazione di un cane
     * -----------------------
     * 
     * 
     */
    if( isset($_GET['elimina']) ) {
        $p['contenuto']['dati']['status'] = 'eliminazione di un cane';
        if( \Cani\elimina($_GET['elimina']) ) {
            $p['contenuto']['dati']['status'] = 'cane eliminato con successo';
        } else {
            $p['contenuto']['dati']['status'] = 'errore nell\'eliminazione del cane';
        }
    }

    /**
     * caricamento di un cane per la modifica
     * --------------------------------------
     * 
     * 
     */
    if( isset($_GET['modifica']) ) {
        $p['contenuto']['dati']['status'] = 'lettura dei dati del cane da modificare';
        $cane = \Cani\dettagli($_GET['modifica']);
        if( !empty($cane) ) {
            $p['contenuto']['dati']['id_cane'] = $cane['id'];
            $p['contenuto']['dati']['nome_cane'] = $cane['nome'];
            $p['contenuto']['dati']['data_nascita_cane'] = $cane['data_nascita'];
        } else {
            $p['contenuto']['dati']['status'] = 'errore nel recupero del cane con id ' . $_GET['modifica'];
        }
    }

    /**
     * modifica di un cane
     * -------------------
     * 
     * 
     */
    if( isset($_POST['nome']) && isset($_POST['data_nascita']) && !empty($_POST['id']) ) {
        $p['contenuto']['dati']['status'] = 'modifica di un cane';
        if( \Cani\modifica($_POST['id'], $_POST['nome'], $_POST['data_nascita']) ) {
            $p['contenuto']['dati']['status'] = 'cane modificato con successo';
        } else {
            $p['contenuto']['dati']['status'] = 'errore nella modifica del cane';
        }
    }

    /**
     * caricamento lista cani
     * ----------------------
     * 
     */
    $p['contenuto']['lista'] = \Cani\lista();

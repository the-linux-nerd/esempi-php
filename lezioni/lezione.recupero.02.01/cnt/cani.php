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
    $dati = [];
    $dati['status'] = 'nessuna operazione in corso';
    $dati['lista_cani'] = '';
    $dati['id_cane'] = '';
    $dati['nome_cane'] = '';
    $dati['data_nascita_cane'] = '';

    /**
     * inserimento di un nuovo cane
     * 
     * 
     */
    if( isset($_POST['nome']) && isset($_POST['data_nascita']) && empty($_POST['id']) ) {
        $dati['status'] = 'inserimento di un nuovo cane';
        if( \Cani\aggiungi($_POST['nome'], $_POST['data_nascita']) ) {
            $dati['status'] = 'cane aggiunto con successo';
        } else {
            $dati['status'] = 'errore nell\'aggiunta del cane';
        }
    }

    /**
     * eliminazione di un cane
     * -----------------------
     * 
     * 
     */
    if( isset($_GET['elimina']) ) {
        $dati['status'] = 'eliminazione di un cane';
        if( \Cani\elimina($_GET['elimina']) ) {
            $dati['status'] = 'cane eliminato con successo';
        } else {
            $dati['status'] = 'errore nell\'eliminazione del cane';
        }
    }

    /**
     * caricamento di un cane per la modifica
     * --------------------------------------
     * 
     * 
     */
    if( isset($_GET['modifica']) ) {
        $dati['status'] = 'lettura dei dati del cane da modificare';
        $cane = \Cani\dettagli($_GET['modifica']);
        if( !empty($cane) ) {
            $dati['id_cane'] = $cane['id'];
            $dati['nome_cane'] = $cane['nome'];
            $dati['data_nascita_cane'] = $cane['data_nascita'];
        } else {
            $dati['status'] = 'errore nel recupero del cane con id ' . $_GET['modifica'];
        }
    }

    /**
     * modifica di un cane
     * -------------------
     * 
     * 
     */
    if( isset($_POST['nome']) && isset($_POST['data_nascita']) && !empty($_POST['id']) ) {
        $dati['status'] = 'modifica di un cane';
        if( \Cani\modifica($_POST['id'], $_POST['nome'], $_POST['data_nascita']) ) {
            $dati['status'] = 'cane modificato con successo';
        } else {
            $dati['status'] = 'errore nella modifica del cane';
        }
    }

    /**
     * caricamento lista cani
     * ----------------------
     * 
     */
    $lista = \Cani\lista();

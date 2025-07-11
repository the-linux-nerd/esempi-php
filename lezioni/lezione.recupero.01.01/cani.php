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

    /**
     * inclusione librerie
     * -------------------
     * 
     */
    require_once 'lib/render.php';

    /**
     * caricamento lista cani
     * ----------------------
     * 
     */
    $lista = unserialize(file_get_contents('db/cani.db')) ?? [];

    /**
     * inserimento di un nuovo cane
     * 
     * 
     */
    if( isset($_POST['nome']) && empty($_POST['id']) ) {
        $cane = [
            'id' => md5( microtime(true) ),
            'nome' => $_POST['nome']
        ];
        $lista[] = $cane;
        file_put_contents('db/cani.db', serialize($lista));
    }

    /**
     * renderizzazione lista cani
     * --------------------------
     * 
     * 
     */
    $dati['lista_cani'] = '';
    foreach($lista as $cane) {
        $dati['lista_cani'] .= \Render\render('tpl/cani.tr.html', $cane);
    }

    /**
     * rendering del template
     * 
     */
    echo \Render\render('tpl/cani.html', $dati);

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
    $dati['lista_cani'] = '';
    $dati['id_cane'] = '';
    $dati['nome_cane'] = '';

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
        $id = md5( microtime(true) );
        $cane = [
            'id' => $id,
            'nome' => $_POST['nome']
        ];
        $lista[$id] = $cane;
        file_put_contents('db/cani.db', serialize($lista));
    }

    /**
     * eliminazione di un cane
     * -----------------------
     * 
     * 
     */
    if( isset($_GET['elimina']) ) {
        unset( $lista[$_GET['elimina']] );
        file_put_contents('db/cani.db', serialize($lista));
    }

    /**
     * caricamento di un cane per la modifica
     * --------------------------------------
     * 
     * 
     */
    if( isset($_GET['modifica']) ) {
        if( isset($lista[$_GET['modifica']]) ) {
            $dati['id_cane'] = $lista[$_GET['modifica']]['id'];
            $dati['nome_cane'] = $lista[$_GET['modifica']]['nome'];
        }
    }

    /**
     * modifica di un cane
     * -------------------
     * 
     * 
     */
    if( isset($_POST['nome']) && !empty($_POST['id']) ) {
        $lista[$_POST['id']]['id'] = $_POST['id'];
        $lista[$_POST['id']]['nome'] = $_POST['nome'];
        file_put_contents('db/cani.db', serialize($lista));
    }

    /**
     * renderizzazione lista cani
     * --------------------------
     * 
     * 
     */
    if( is_array($lista) ) {
        foreach($lista as $cane) {
            $dati['lista_cani'] .= \Render\render('tpl/cani.tr.html', $cane);
        }
    }

    /**
     * rendering del template
     * 
     */
    echo \Render\render('tpl/cani.html', $dati);

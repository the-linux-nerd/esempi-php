<?php

    /**
     * gestione delle persone
     * ======================
     * 
     * Questo file contiene le logiche e le funzioni per la gestione delle persone.
     * 
     * 
     * 
     */

    // array per i dati da passare al template
    $dati = [];
    $dati['lista_persone'] = '';
    $dati['id_persona'] = '';
    $dati['nome_persona'] = '';

    /**
     * inclusione librerie
     * -------------------
     * 
     */
    require_once 'lib/render.php';

    /**
     * caricamento lista persone
     * -------------------------
     * 
     * 
     */
    $lista = unserialize(file_get_contents('db/persone.db')) ?? [];

    /**
     * inserimento di una nuova persona
     * --------------------------------
     * 
     * 
     * 
     */
    if( isset($_POST['nome']) && empty($_POST['id']) ) {
        $id = md5( microtime(true) );
        $persona = [
            'id' => $id,
            'nome' => $_POST['nome']
        ];
        $lista[$id] = $persona;
        file_put_contents('db/persone.db', serialize($lista));
    }

    /**
     * eliminazione di una persona
     * ---------------------------
     * 
     * 
     */
    if( isset($_GET['elimina']) ) {
        unset( $lista[$_GET['elimina']] );
        file_put_contents('db/persone.db', serialize($lista));
    }

    /**
     * caricamento di una persona per la modifica
     * ------------------------------------------
     * 
     * 
     */
    if( isset($_GET['modifica']) ) {
        if( isset($lista[$_GET['modifica']]) ) {
            $dati['id_persona'] = $lista[$_GET['modifica']]['id'];
            $dati['nome_persona'] = $lista[$_GET['modifica']]['nome'];
        }
    }

    /**
     * modifica di una persona
     * -----------------------
     * 
     * 
     */
    if( isset($_POST['nome']) && !empty($_POST['id']) ) {
        $lista[$_POST['id']]['id'] = $_POST['id'];
        $lista[$_POST['id']]['nome'] = $_POST['nome'];
        file_put_contents('db/persone.db', serialize($lista));
    }

    /**
     * renderizzazione lista persone
     * -----------------------------
     * 
     */
    if( is_array($lista) ) {
        foreach($lista as $persona) {
            $dati['lista_persone'] .= \Render\render('tpl/persone.tr.html', $persona);
        }
    }

    /**
     * rendering del template
     * 
     */
    echo \Render\render('tpl/persone.html', $dati);

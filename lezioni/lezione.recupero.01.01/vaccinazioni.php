<?php

    /**
     * gestione delle vaccinazioni
     * ===========================
     * 
     * Questo file contiene le logiche e le funzioni per la gestione delle vaccinazioni.
     * 
     * 
     * 
     */

    // array per i dati da passare al template
    $dati = [];
    $dati['lista_vaccinazioni'] = '';
    $dati['id_vaccinazione'] = '';
    $dati['id_cane'] = '';
    $dati['data_vaccinazione'] = '';
    $dati['opzioni_cani'] = '';

    $lista_cani = unserialize(file_get_contents('db/cani.db')) ?? [];

    /**
     * inclusione librerie
     * -------------------
     * 
     */
    require_once 'lib/render.php';

    /**
     * caricamento lista vaccinazioni
     * 
     * 
     */
    $lista = unserialize(file_get_contents('db/vaccinazioni.db')) ?? [];

    /**
     * inserimento di una nuova vaccinazione
     * -------------------------------------
     * 
     * 
     * 
     */
    if( isset($_POST['data_vaccinazione']) && empty($_POST['id']) ) {
        $id = md5( microtime(true) );
        $vaccinazione = [
            'id' => $id,
            'id_cane' => $_POST['id_cane'],
            'data_vaccinazione' => $_POST['data_vaccinazione']
        ];
        $lista[$id] = $vaccinazione;
        file_put_contents('db/vaccinazioni.db', serialize($lista));
    }

    /**
     * eliminazione di una vaccinazione
     * --------------------------------
     * 
     * 
     */
    if( isset($_GET['elimina']) ) {
        unset( $lista[$_GET['elimina']] );
        file_put_contents('db/vaccinazioni.db', serialize($lista));
    }

    /**
     * caricamento di una vaccinazione per la modifica
     * ----------------------------------------------
     * 
     * 
     */
    if( isset($_GET['modifica']) ) {
        if( isset($lista[$_GET['modifica']]) ) {
            $dati['id_vaccinazione'] = $lista[$_GET['modifica']]['id'];
            $dati['id_cane'] = $lista[$_GET['modifica']]['id_cane'];
            $dati['data_vaccinazione'] = $lista[$_GET['modifica']]['data_vaccinazione'];
        }
    }

    /**
     * modifica di una vaccinazione
     * -----------------------------
     * 
     * 
     */
    if( isset($_POST['data_vaccinazione']) && !empty($_POST['id']) ) {
        $lista[$_POST['id']]['id'] = $_POST['id'];
        $lista[$_POST['id']]['id_cane'] = $_POST['id_cane'];
        $lista[$_POST['id']]['data_vaccinazione'] = $_POST['data_vaccinazione'];
        file_put_contents('db/vaccinazioni.db', serialize($lista));
    }

    /**
     * renderizzazione lista vaccinazioni
     * ----------------------------------
     * 
     * 
     */
    if( is_array($lista) ) {
        foreach($lista as $vaccinazione) {
            $vaccinazione['nome_cane'] = isset($lista_cani[$vaccinazione['id_cane']]) ? $lista_cani[$vaccinazione['id_cane']]['nome'] : 'Sconosciuto';
            $dati['lista_vaccinazioni'] .= \Render\render('tpl/vaccinazioni.tr.html', $vaccinazione);
        }
    }

    /**
     * renderizzazione opzioni select cani
     * -----------------------------------
     * 
     * 
     */
    if( is_array($lista_cani) ) {
        foreach($lista_cani as $cane) {
            if( isset($dati['id_cane']) && $dati['id_cane'] == $cane['id'] ) {
                $cane['selected'] = 'selected';
            } else {
                $cane['selected'] = '';
            }
            $dati['opzioni_cani'] .= \Render\render('tpl/vaccinazioni.option.cani.html', $cane);
        }
    }

    /**
     * rendering del template
     * 
     */
    echo \Render\render('tpl/vaccinazioni.html', $dati);

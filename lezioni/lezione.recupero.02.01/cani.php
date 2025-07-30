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

    /**
     * file inclusi
     * ------------
     * 
     */

    // librerie
    require_once 'lib/render.php';
    require_once 'lib/db.php';

    // model
    require_once 'mod/cani.php';

    // controller
    require_once 'cnt/cani.php';

    /**
     * renderizzazione output
     * ----------------------
     * 
     * 
     */

    // renderizzazione lista cani
    if( is_array($lista) ) {
        foreach($lista as $cane) {
            $dati['lista_cani'] .= \Render\render('tpl/cani.tr.html', $cane);
        }
    }

    // renderizzazione template principale
    echo \Render\render('tpl/cani.html', $dati);

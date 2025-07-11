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
     * rendering del template
     * 
     */
    echo \Render\render('tpl/cani.html', $dati);

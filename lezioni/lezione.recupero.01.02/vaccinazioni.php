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
    echo \Render\render('tpl/vaccinazioni.html', $dati);

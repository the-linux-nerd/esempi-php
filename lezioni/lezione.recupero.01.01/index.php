<?php

    /**
     * file principale dell'applicazione
     * =================================
     * 
     * Questo file serve solo per smistare i visitatori verso le varie pagine.
     * 
     */

    // array per i dati da passare al template
    $dati = [];

    /**
     * inclusione librerie
     * -------------------
     * 
     * 
     */
    require_once 'lib/render.php';

    /**
     * rendering del template
     * 
     * 
     */
    echo \Render\render('tpl/index.html', $dati);

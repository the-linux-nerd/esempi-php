<?php

    /**
     * libreria per la gestione del database
     * =====================================
     * 
     * 
     * 
     */

    namespace DB;

    /**
     * effettua la connessione al database
     * -----------------------------------
     * 
     * 
     */
    function connect() {

        // dati di connessione
        $server = "10.240.0.8";
        $port = "3306";
        $user = "futura";
        $pass = "Futura2025!";
        $db = "com_istricesrl_futura_dev";

        // connessione al database
        try {
            $GLOBALS['conn'] = mysqli_connect($server, $user, $pass, $db, $port);
        } catch (Exception $e) {
            die("connessione al database fallita: " . $e->getMessage());
        }

    }

    /**
     * restituisce la connessione al database
     * --------------------------------------
     * 
     * 
     */
    function getConnection() {

        // se non c'è già una connessione la creo
        if( ! isset($GLOBALS['conn']) ) {
            connect();
        }

        // restituisco la connessione
        return $GLOBALS['conn'];

    }

<?php

    /**
     * connessione al database
     * =======================
     * 
     */

    // dati di connessione
    $server = "10.240.0.8";
    $port = "3306";
    $user = "futura";
    $pass = "Futura2025!";
    $db = "com_istricesrl_futura_dev";

    // connessione al database
    try {
        $conn = mysqli_connect($server, $user, $pass, $db, $port);
    } catch (Exception $e) {
        die("connessione al database fallita: " . $e->getMessage());
    }

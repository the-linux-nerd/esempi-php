<?php

    try {
        $conn = mysqli_connect($server, $user, $pass, $db, $port);
    } catch (Exception $e) {
        die("connessione al database fallita: " . $e->getMessage());
    }

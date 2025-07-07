<?php

    $server = "mysql.istricesrl.it";
    $port = "3306";
    $user = "futura";
    $pass = "Futura2025!";
    $db = "com_istricesrl_futura_dev";

    $conn = mysqli_connect($server, $user, $pass, $db, $port);

    if (!$conn) {
        die("connessione al database fallita: " . mysqli_connect_error());
    } else {
        // var_dump($conn);
    }

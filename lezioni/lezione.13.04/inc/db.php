<?php

    $conn = mysqli_connect($server, $user, $pass, $db, $port);

    if (!$conn) {
        die("connessione al database fallita: " . mysqli_connect_error());
    } else {
        // var_dump($conn);
    }

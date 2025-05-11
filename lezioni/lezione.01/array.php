<?php

    $frutta = array("mela", "banana", "kiwi", "arancia");

    $persona = array(
        "nome" => "Mario",
        "cognome" => "Rossi",
        "eta" => 30,
        "citta" => "Roma"
    );

    echo '<h1>' . $persona["nome"] . ' ' . $persona["cognome"] . '</h1>' . PHP_EOL;
    echo '<p>' . $persona["nome"] . ' ha ' . $persona["eta"] . ' anni e vive a ' . $persona["citta"] . '</p>' . PHP_EOL;
    echo '<p>A ' . $persona["nome"] . ' piace sopratutto la ' . $frutta[0] . '</p>' . PHP_EOL;

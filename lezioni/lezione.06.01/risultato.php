<?php

    require_once 'lib/render.php';
    require_once 'lib/math.php';

    $somma = somma($_POST['a'], $_POST['b']);

    echo render('tpl/risultato.html', array(
        'a' => $_POST['a'],
        'b' => $_POST['b'],
        'somma' => $somma
    ));

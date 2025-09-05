<?php

    // composer
    require_once 'lib/ext/autoload.php';

    // loader Twig
    $loader = new \Twig\Loader\FilesystemLoader('tpl');

    // ambiente Twig
    $twig = new \Twig\Environment($loader);

    // caricamento template
    $template = $twig->load('index.twig');

    // rendering template
    echo $template->render(
        array(
            'nome' => 'mondo',
            'variabile' => false,
            'numeri' => [1, 2, 3, 4, 5],
            'lista' => array(
                array('nome' => 'Mario', 'cognome' => 'Rossi'),
                array('nome' => 'Luigi', 'cognome' => 'Verdi'),
                array('nome' => 'Anna', 'cognome' => 'Bianchi'),
            ),
            'colori' => array(
                23 => 'rosso',
                45 => 'verde',
                67 => 'blu',
            ),
        )
    );

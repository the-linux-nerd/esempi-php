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
            'nome' => 'mondo'
        )
    );

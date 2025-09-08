<?php

    // loader Twig
    $loader = new \Twig\Loader\FilesystemLoader('tpl');

    // ambiente Twig
    $twig = new \Twig\Environment($loader);

    // caricamento template
    $template = $twig->load($template);

    // rendering template
    echo $template->render( $dati );

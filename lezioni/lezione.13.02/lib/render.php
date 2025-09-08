<?php

    namespace Render;

    function render($template, $data) {
        $loader = new \Twig\Loader\FilesystemLoader('tpl');
        $twig = new \Twig\Environment($loader);
        $template = $twig->load($template);
        return $template->render($data);
    }

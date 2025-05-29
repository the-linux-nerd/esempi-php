<?php

    // pagine
    $pagine = array(
        1 => array(
            'titolo' => 'Pagina 1',
            'contenuto' => 'Contenuto della pagina 1'
        ),
        2 => array(
            'titolo' => 'Pagina 2',
            'contenuto' => 'Contenuto della pagina 2'
        )
    );

    // se è richiesta una pagina specifica
    if (isset($_GET['pagina']) && array_key_exists($_GET['pagina'], $pagine)) {

        // individuo la pagina richiesta
        $pagina = $pagine[$_GET['pagina']];

        // leggo il contenuto del template
        $template = file_get_contents('tpl/index.html');

        // sostituisco i segnaposto con i dati della pagina
        foreach ($pagina as $key => $value) {
            $template = str_replace('{{' . $key . '}}', $value, $template); 
        }

        // rappresento il template
        echo $template;

    }

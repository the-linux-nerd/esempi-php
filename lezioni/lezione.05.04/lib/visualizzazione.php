<?php

    // funzione che fa il parsing di un template
    function renderizza($template, $dati) {

        // leggo il contenuto del template
        $contenuto = file_get_contents($template);

        // sostituisco i segnaposto con i dati della pagina
        foreach ($dati as $key => $value) {
            $contenuto = str_replace('{{' . $key . '}}', $value, $contenuto); 
        }

        // rappresento il template
        return $contenuto;

    }

    // funzione che crea il menu
    function creaMenu($placeholder, $pagine, $output) {

        // inizializzo il menu
        $menu = '';

        // creo il menu saltando la pagina non trovata
        foreach ($pagine as $key => $pagina) {
            if ($key != 0) {
                $menu .= '<li><a href="?pagina=' . $key . '">' . $pagina['titolo'] . '</a></li>';
            }
        }

        // sostituisco il segnaposto con il menu
        return str_replace($placeholder, $menu, $output);

    }

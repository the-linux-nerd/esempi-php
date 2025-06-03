<?php

    // funzione che fa il parsing di un template
    function render($template, $dati) {

        // leggo il contenuto del template
        $contenuto = file_get_contents($template);

        // sostituisco i segnaposto con i dati della pagina
        foreach ($dati as $key => $value) {
            $contenuto = str_replace('{{' . $key . '}}', $value, $contenuto); 
        }

        // rappresento il template
        return $contenuto;

    }

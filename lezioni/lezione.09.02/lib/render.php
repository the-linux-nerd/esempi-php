<?php

    /**
     * libreria per il rendering dei template
     */

    namespace Render;

    /**
     * renderizza un template con i dati forniti
     * @param string $tpl il percorso del template
     * @param array $dati i dati da inserire nel template
     * @return string il contenuto renderizzato
     */
    function render($tpl, $dati) {
        $contenuto = file_get_contents($tpl);
        foreach ($dati as $k => $v) {
            $contenuto = str_replace('{{' . $k . '}}', $v, $contenuto);
        }
        return $contenuto;
    }

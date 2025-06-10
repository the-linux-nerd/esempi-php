<?php

    /**
     * libreria per la gestione della rubrica
     */

    namespace Rubrica;

    /**
     * aggiunge una persona alla rubrica
     * @param string $nome
     * @param string $telefono
     * @return boolean true se l'aggiunta è andata a buon fine, false altrimenti
     */
    function aggiungi($nome, $telefono) {
        $rubrica = lista();
        $rubrica[] = [
            'nome' => $nome,
            'telefono' => $telefono
        ];
        $h = fopen('./rubrica.db', 'w+');
        if ($h === false) {
            return false;
        } else {
            fwrite($h, serialize($rubrica));
            fclose($h);
            return true;
        }
    }

    /**
     * restituisce la lista delle persone nella rubrica
     * @return array un array associativo con le persone nella rubrica
     */
    function lista() {
        if (!file_exists('./rubrica.db')) {
            return [];
        } else {
            return unserialize(file_get_contents('./rubrica.db'));
        }
    }

<?php

    /**
     * libreria per la gestione dei persone
     */

    namespace Persone;

    define( 'DB_PERSONE', './persone.db' );

    /**
     * aggiunge una persona alla lista
     * @param string $nome il nome della persona
     * @param string $telefono il telefono della persona
     * @return bool true se l'aggiunta è riuscita, false altrimenti
     */
    function aggiungi($nome, $telefono) {
        $persone = lista();
        $id = md5('persone-'.microtime(true).rand(0, 1000));
        $persone[ $id ] = [
            'nome' => $nome,
            'telefono' => $telefono
        ];
        return salva($persone);
    }

    /**
     * restituisce la lista dei persone
     * @return array un array associativo con i persone
     */
    function lista() {
        if (!file_exists(DB_PERSONE)) {
            return [];
        } else {
            return unserialize(file_get_contents(DB_PERSONE));
        }
    }

    /**
     * elimina una persona dalla lista
     * @param string $id l'id della persona da eliminare
     * @return bool true se l'eliminazione è riuscita, false altrimenti
     */
    function elimina($id) {
        $persone = lista();
        if (isset($persone[$id])) {
            unset($persone[$id]);
            return salva($persone);
        } else {
            return false;
        }
    }

    /**
     * modifica una persona nella lista
     * @param string $id l'id della persona da modificare
     * @param string $nome il nuovo nome della persona
     * @param string $telefono il nuovo telefono della persona
     * @return bool true se la modifica è riuscita, false altrimenti
     */
    function modifica($id, $nome, $telefono) {
        $persone = lista();
        if (isset($persone[$id])) {
            $persone[$id] = [
                'nome' => $nome,
                'telefono' => $telefono
            ];
            return salva($persone);
        } else {
            return false;
        }
    }

    /**
     * salva la lista dei persone su file
     * @param array $persone l'array associativo con i persone
     * @return bool true se il salvataggio è riuscito, false altrimenti
     */
    function salva($persone) {
        $h = fopen(DB_PERSONE, 'w+');
        if ($h === false) {
            return false;
        } else {
            fwrite($h, serialize($persone));
            fclose($h);
            return true;
        }
    }

    /**
     * restituisce un singolo elemento della lista
     * @param string $id l'id della persona da restituire
     * @return array|false l'array associativo con i dati della persona, o false se non esiste
     */
    function get($id) {
        $persone = lista();
        if (isset($persone[$id])) {
            return $persone[$id];
        } else {
            return false;
        }
    }

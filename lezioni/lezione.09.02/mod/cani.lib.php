<?php

    /**
     * libreria per la gestione dei cani
     */

    namespace Cani;

    define( 'DB_FILE', './cani.db' );

    /**
     * aggiunge un cane alla lista
     * @param string $nome il nome del cane
     * @param int $anno_nascita l'anno di nascita del cane
     * @return bool true se l'aggiunta è riuscita, false altrimenti
     */
    function aggiungi($nome, $anno_nascita) {
        $cani = lista();
        $id = md5('cani-'.microtime(true).rand(0, 1000));
        $cani[ $id ] = [
            'nome' => $nome,
            'anno_nascita' => $anno_nascita
        ];
        return salva($cani);
    }

    /**
     * restituisce la lista dei cani
     * @return array un array associativo con i cani
     */
    function lista() {
        if (!file_exists(DB_FILE)) {
            return [];
        } else {
            return unserialize(file_get_contents(DB_FILE));
        }
    }

    /**
     * elimina un cane dalla lista
     * @param string $id l'id del cane da eliminare
     * @return bool true se l'eliminazione è riuscita, false altrimenti
     */
    function elimina($id) {
        $cani = lista();
        if (isset($cani[$id])) {
            unset($cani[$id]);
            return salva($cani);
        } else {
            return false;
        }
    }

    /**
     * modifica un cane nella lista
     * @param string $id l'id del cane da modificare
     * @param string $nome il nuovo nome del cane
     * @param int $anno_nascita il nuovo anno di nascita del cane
     * @return bool true se la modifica è riuscita, false altrimenti
     */
    function modifica($id, $nome, $anno_nascita) {
        $cani = lista();
        if (isset($cani[$id])) {
            $cani[$id] = [
                'nome' => $nome,
                'anno_nascita' => $anno_nascita
            ];
            return salva($cani);
        } else {
            return false;
        }
    }

    /**
     * salva la lista dei cani su file
     * @param array $cani l'array associativo con i cani
     * @return bool true se il salvataggio è riuscito, false altrimenti
     */
    function salva($cani) {
        $h = fopen(DB_FILE, 'w+');
        if ($h === false) {
            return false;
        } else {
            fwrite($h, serialize($cani));
            fclose($h);
            return true;
        }
    }

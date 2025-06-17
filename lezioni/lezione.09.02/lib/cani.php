<?php

    /**
     * libreria per la gestione dei cani
     */

    namespace Cani;

    define( 'DB_FILE', DB_FILE );

    /**
     * aggiunge una persona alla rubrica
     * @param string $nome
     * @param string $anno_nascita
     * @return boolean true se l'aggiunta è andata a buon fine, false altrimenti
     */
    function aggiungi($nome, $anno_nascita) {
        $cani = lista();
        $id = md5('cani-'.microtime(true).rand(0, 1000));
        $cani[ $id ] = [
            'nome' => $nome,
            'anno_nascita' => $anno_nascita
        ];
        $h = fopen(DB_FILE, 'w+');
        if ($h === false) {
            return false;
        } else {
            fwrite($h, serialize($cani));
            fclose($h);
            return true;
        }
    }

    /**
     * restituisce la lista delle persone nella rubrica
     * @return array un array associativo con le persone nella rubrica
     */
    function lista() {
        if (!file_exists(DB_FILE)) {
            return [];
        } else {
            return unserialize(file_get_contents(DB_FILE));
        }
    }

    /**
     * elimina una persona dalla rubrica
     * @param string $id l'id della persona da eliminare
     * @return boolean true se l'eliminazione è andata a buon fine, false altrimenti
     */
    function elimina($id) {
        $cani = lista();
        if (isset($cani[$id])) {
            unset($cani[$id]);
            $h = fopen(DB_FILE, 'w+');
            if ($h === false) {
                return false;
            } else {
                fwrite($h, serialize($cani));
                fclose($h);
                return true;
            }
        } else {
            return false;
        }
    }

    /**
     * aggiorna una persona nella rubrica
     * @param string $id l'id della persona da aggiornare
     * @param string $nome il nuovo nome della persona
     * @param string $anno_nascita il nuovo anno_nascita della persona
     * @return boolean true se l'aggiornamento è andato a buon fine, false altrimenti
     */
    function modifica($id, $nome, $anno_nascita) {
        $cani = lista();
        if (isset($cani[$id])) {
            $cani[$id] = [
                'nome' => $nome,
                'anno_nascita' => $anno_nascita
            ];
            $h = fopen(DB_FILE, 'w+');
            if ($h === false) {
                return false;
            } else {
                fwrite($h, serialize($cani));
                fclose($h);
                return true;
            }
        } else {
            return false;
        }
    }

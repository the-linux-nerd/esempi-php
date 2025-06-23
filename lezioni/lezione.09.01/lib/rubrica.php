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
        $id = md5('rubrica-'.microtime(true).rand(0, 1000));
        $rubrica[ $id ] = [
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

    /**
     * elimina una persona dalla rubrica
     * @param string $id l'id della persona da eliminare
     * @return boolean true se l'eliminazione è andata a buon fine, false altrimenti
     */
    function elimina($id) {
        $rubrica = lista();
        if (isset($rubrica[$id])) {
            unset($rubrica[$id]);
            $h = fopen('./rubrica.db', 'w+');
            if ($h === false) {
                return false;
            } else {
                fwrite($h, serialize($rubrica));
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
     * @param string $telefono il nuovo telefono della persona
     * @return boolean true se l'aggiornamento è andato a buon fine, false altrimenti
     */
    function modifica($id, $nome, $telefono) {
        $rubrica = lista();
        if (isset($rubrica[$id])) {
            $rubrica[$id] = [
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
        } else {
            return false;
        }
    }

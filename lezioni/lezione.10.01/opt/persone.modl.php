<?php

    /**
     * libreria per la gestione delle persone
     */

    namespace Persone;

    /**
     * aggiunge una persona alla lista
     * 
     * 
     */
    function aggiungi($nome, $numero) {

        if( ! empty($nome) && ! empty($numero) ) {
            $nome = trim($nome);
            $numero = trim($numero);
            $sql = "INSERT INTO persone (nome, numero) VALUES (:nome, :numero)";
            $params = [
                ':nome' => $nome,
                ':numero' => $numero
            ];
            $sql = \DB\prepare($sql,$params);
            $res = mysqli_query(\DB\getConnection(), $sql);
            return $res;
        } else {
            return false;
        }

    }

    /**
     * modifica una persona nella lista
     * 
     * 
     */
    function modifica($id, $nome, $numero) {
        if( ! empty($id) && is_numeric($id) && ! empty($nome) && ! empty($numero) ) {
            $id = intval($id);
            $nome = trim($nome);
            $numero = trim($numero);
            $sql = "UPDATE persone SET nome = :nome, numero = :numero WHERE id = :id";
            $params = [
                ':id' => $id,
                ':nome' => $nome,
                ':numero' => $numero
            ];
            $sql = \DB\prepare($sql, $params);
            $res = mysqli_query(\DB\getConnection(), $sql);
            return $res;
        } else {
            return false;
        }
    }

    /**
     * elimina una persona dalla lista
     * 
     * 
     */
    function elimina($id) {
        if( ! empty($id) && is_numeric($id) ) {
            $id = intval($id);
            $sql = "DELETE FROM persone WHERE id = :id";
            $params = [':id' => $id];
            $sql = \DB\prepare($sql, $params);
            $res = mysqli_query(\DB\getConnection(), $sql);
            return $res;
        } else {
            return false;
        }
    }

    /**
     * restituisce la lista delle persone
     * 
     * 
     */
    function lista() {

        $sql = "SELECT * FROM persone";
        $res = mysqli_query(\DB\getConnection(), $sql);
        $persone = [];
        while ($row = mysqli_fetch_assoc($res)) {
            $persone[] = $row;
        }
        return $persone;

    }

    /**
     * restituisce i dettagli di una persona
     * 
     * 
     */
    function dettagli($id) {
        if( ! empty($id) && is_numeric($id) ) {
            $id = intval($id);
            $sql = "SELECT * FROM persone WHERE id = :id";
            $params = [':id' => $id];
            $sql = \DB\prepare($sql, $params);
            $res = mysqli_query(\DB\getConnection(), $sql);
            return mysqli_fetch_assoc($res);
        } else {
            return false;
        }
    }

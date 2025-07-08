<?php

    /**
     * libreria per la gestione delle Cani
     */

    namespace Cani;

    /**
     * aggiunge una persona alla lista
     * 
     * 
     */
    function aggiungi($nome, $data_nascita) {

        if( ! empty($nome) && ! empty($data_nascita) ) {
            $nome = trim($nome);
            $data_nascita = trim($data_nascita);
            $sql = "INSERT INTO cani (nome, data_nascita) VALUES ( ?, ? )";
            $stmt = mysqli_prepare( \DB\getConnection(), $sql );
            mysqli_stmt_bind_param( $stmt, 'ss', $nome, $data_nascita );
            return mysqli_stmt_execute( $stmt );
        } else {
            return false;
        }

    }

    /**
     * modifica una persona nella lista
     * 
     * 
     */
    function modifica($id, $nome, $data_nascita) {
        if( ! empty($id) && is_numeric($id) && ! empty($nome) && ! empty($data_nascita) ) {
            $id = intval($id);
            $nome = trim($nome);
            $data_nascita = trim($data_nascita);
            $sql = "UPDATE cani SET nome = ?, data_nascita = ? WHERE id = ?";
            $stmt = mysqli_prepare( \DB\getConnection(), $sql );
            mysqli_stmt_bind_param( $stmt, 'ssi', $nome, $data_nascita, $id );
            return mysqli_stmt_execute( $stmt );
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
            $sql = "DELETE FROM cani WHERE id = ?";
            $stmt = mysqli_prepare( \DB\getConnection(), $sql );
            mysqli_stmt_bind_param( $stmt, 'i', $id );
            return mysqli_stmt_execute( $stmt );
        } else {
            return false;
        }
    }

    /**
     * restituisce la lista delle cani
     * 
     * 
     */
    function lista() {

        $sql = "SELECT * FROM cani";
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
            $sql = "SELECT * FROM cani WHERE id = :id";
            $params = [':id' => $id];
            $sql = \DB\prepare($sql, $params);
            $res = mysqli_query(\DB\getConnection(), $sql);
            return mysqli_fetch_assoc($res);
        } else {
            return false;
        }
    }

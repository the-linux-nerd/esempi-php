<?php

    /**
     * libreria per la gestione dei cani
     * =================================
     * 
     * 
     */

    // namespace
    namespace Cani;

    /**
     * aggiunta di un cane alla lista
     * ------------------------------
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
     * eliminazione di un cane dalla lista
     * -----------------------------------
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
     * elenco dei cani presenti nel database
     * -------------------------------------
     * 
     * 
     */
    function lista() {
        $sql = "SELECT * FROM cani";
        $result = mysqli_query( \DB\getConnection(), $sql );
        $lista = [];
        while( $row = mysqli_fetch_assoc($result) ) {
            $lista[] = $row;
        }
        return $lista;
    }

    /**
     * restituzione dei dettagli di un cane
     * ------------------------------------
     * 
     * 
     */
    function dettagli($id) {
        if( ! empty($id) && is_numeric($id) ) {
            $id = intval($id);
            $sql = "SELECT * FROM cani WHERE id = ?";
            $stmt = mysqli_prepare( \DB\getConnection(), $sql );
            mysqli_stmt_bind_param( $stmt, 'i', $id );
            mysqli_stmt_execute( $stmt );
            $result = mysqli_stmt_get_result( $stmt );
            return mysqli_fetch_assoc( $result );
        } else {
            return false;
        }
    }

    /**
     * modifica di un cane
     * -------------------
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

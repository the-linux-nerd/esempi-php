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

            
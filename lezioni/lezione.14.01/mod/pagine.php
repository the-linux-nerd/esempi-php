<?php

    /**
     * libreria per la gestione dei cani
     * =================================
     * 
     * 
     */

    // namespace
    namespace Pagine;

    /**
     * aggiunta di una pagina alla lista
     * ---------------------------------
     * 
     * 
     */
    function aggiungi($url, $template, $titolo, $h1) {

        if( ! empty($url) && ! empty($template) && ! empty($titolo) && ! empty($h1) ) {
            $url = trim($url);
            $template = trim($template);
            $titolo = trim($titolo);
            $h1 = trim($h1);
            $sql = "INSERT INTO pagine (url, template, contenuto) VALUES ( ?, ?, ? )";
            $stmt = mysqli_prepare( \DB\getConnection(), $sql );
            mysqli_stmt_bind_param( $stmt, 'sss', $url, $template, json_encode(array('titolo' => $titolo, 'h1' => $h1)) );
            return mysqli_stmt_execute( $stmt );
        } else {
            return false;
        }

    }

    /**
     * eliminazione di una pagina dalla lista
     * --------------------------------------
     * 
     * 
     */
    function elimina($id) {
        if( ! empty($id) && is_numeric($id) ) {
            $id = intval($id);
            $sql = "DELETE FROM pagine WHERE id = ?";
            $stmt = mysqli_prepare( \DB\getConnection(), $sql );
            mysqli_stmt_bind_param( $stmt, 'i', $id );
            $res = mysqli_stmt_execute( $stmt );
            if( $res ) {
                $sql = "DELETE FROM pagine_include WHERE id_pagina = ?";
                $stmt = mysqli_prepare( \DB\getConnection(), $sql );
                mysqli_stmt_bind_param( $stmt, 'i', $id );
                mysqli_stmt_execute( $stmt );
            }
            return $res;
        } else {
            return false;
        }
    }

    /**
     * elenco delle pagine presenti nel database
     * -----------------------------------------
     * 
     * 
     */
    function lista() {
        $sql = "SELECT * FROM pagine";
        $result = mysqli_query( \DB\getConnection(), $sql );
        $lista = [];
        while( $row = mysqli_fetch_assoc($result) ) {
            $row['contenuto'] = json_decode($row['contenuto'], true);
            $row['contenuto']['menu'] = [];
            $row['include'] = [];
            $sql = "SELECT * FROM pagine_include WHERE id_pagina = ?";
            $stmt = mysqli_prepare( \DB\getConnection(), $sql );
            mysqli_stmt_bind_param( $stmt, 'i', $row['id'] );
            $exec = mysqli_stmt_execute( $stmt );
            $res = mysqli_stmt_get_result( $stmt );
            $include = mysqli_fetch_all( $res, MYSQLI_ASSOC );
            foreach ($include as $k => $v) {
                $row['include'][ $k ] = $v['path'];
            }
            $lista[] = $row;
        }
        return $lista;
    }

    /**
     * restituzione dei dettagli di una pagina
     * ---------------------------------------
     * 
     * 
     */
    function dettagli($id) {
        if( ! empty($id) && is_numeric($id) ) {
            $id = intval($id);
            $sql = "SELECT * FROM pagine WHERE id = ?";
            $stmt = mysqli_prepare( \DB\getConnection(), $sql );
            mysqli_stmt_bind_param( $stmt, 'i', $id );
            mysqli_stmt_execute( $stmt );
            $result = mysqli_stmt_get_result( $stmt );
            $result = mysqli_fetch_assoc( $result );
            $result['contenuto'] = json_decode( $result['contenuto'], true );
            $result['contenuto']['menu'] = [];
            $result['include'] = [];
            $sql = "SELECT * FROM pagine_include WHERE id_pagina = ?";
            $stmt = mysqli_prepare( \DB\getConnection(), $sql );
            mysqli_stmt_bind_param( $stmt, 'i', $id );
            $exec = mysqli_stmt_execute( $stmt );
            $res = mysqli_stmt_get_result( $stmt );
            $include = mysqli_fetch_all( $res, MYSQLI_ASSOC );
            foreach ($include as $k => $v) {
                $result['include'][ $k ] = $v['path'];
            }
            return $result;
        } else {
            return false;
        }
    }

    /**
     * modifica di una pagina
     * ----------------------
     * 
     * 
     */
    function modifica($id, $url, $template, $titolo, $h1, $include = []) {
        if( ! empty($id) && is_numeric($id) && ! empty($template) && ! empty($titolo) && ! empty($h1) ) {
            $contenuto = json_encode(array('titolo' => $titolo, 'h1' => $h1));
            $sql = "UPDATE pagine SET url = ?, template = ?, contenuto = ? WHERE id = ?";
            $stmt = mysqli_prepare( \DB\getConnection(), $sql );
            mysqli_stmt_bind_param( $stmt, 'sssi', $url, $template, $contenuto, $id );
            $res = mysqli_stmt_execute( $stmt );
            if( $res && ! empty($include) && is_array($include) ) {
                $sql = "DELETE FROM pagine_include WHERE id_pagina = ?";
                $stmt = mysqli_prepare( \DB\getConnection(), $sql );
                mysqli_stmt_bind_param( $stmt, 'i', $id );
                mysqli_stmt_execute( $stmt );
                foreach ($include as $key => $value) {
                    $path = trim($value);
                    if( ! empty($path) ) {
                        $sql = "INSERT INTO pagine_include (id_pagina, path) VALUES ( ?, ? )";
                        $stmt = mysqli_prepare( \DB\getConnection(), $sql );
                        mysqli_stmt_bind_param( $stmt, 'is', $id, $path );
                        mysqli_stmt_execute( $stmt );
                    }
                }
            }
            return $res;
        } else {
            return false;
        }
    }

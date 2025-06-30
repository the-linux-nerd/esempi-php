<?php

    Namespace DB;

    function prepare($sql,$params) {

        foreach ($params as $key => $value) {
            $sql = str_replace($key, "'" . $value . "'", $sql);
        }

        return $sql;

    }

    function getConnection() {

        return $GLOBALS['conn'];

    }

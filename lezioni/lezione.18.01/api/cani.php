<?php

    // header
    header("Content-Type: application/json");
    header("Access-Control-Allow-Origin: *");

    // catturo il metodo HTTP usato
    $method = $_SERVER['REQUEST_METHOD'];
    $message = [];

    // switch in base al metodo
    switch($method) {
        case 'GET':

            // implementare
            $message = ["metodo" => "GET"];

            // se c'è un id
            if (isset($_GET['id'])) {
                $message['id'] = $_GET['id'];
            }

            break;

        case 'POST':

            // implementare
            $message = ["metodo" => "POST"];

            break;

        case 'PUT':

            // implementare
            $message = ["metodo" => "PUT"];

            break;

        case 'DELETE':

            // implementare
            $message = ["metodo" => "DELETE"];

            break;

        default:

            // metodo non supportato
            http_response_code(405); // Method Not Allowed
            die(json_encode(["error" => "Metodo non supportato"]));

            break;

    }

    echo json_encode($message);
<?php

    // leggo
    if( file_exists('lista.db') ) {
        $lista = unserialize( file_get_contents('lista.db') );
    } else {
        $lista = [];
    }

    // scrivo
    if( isset($_POST['nome']) && !empty($_POST['nome']) ) {
        if( isset( $_POST['telefono'] ) && !empty($_POST['telefono']) ) {
            $lista[] = array( 'nome' => $_POST['nome'], 'telefono' => $_POST['telefono'] );
            file_put_contents('lista.db', serialize($lista));
        }
    }

    // contenuto della pagina
    echo '<pre>' . print_r( $lista, true ) . '</pre>';
    echo '<form method="post" action="index.php">';
    echo '<input type="text" name="nome" placeholder="nome" required>';
    echo '<input type="text" name="telefono" placeholder="telefono" required>';
    echo '<input type="submit" name="aggiungi" value="Aggiungi">';
    echo '</form>';

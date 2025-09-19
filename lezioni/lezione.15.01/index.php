<?php

    require_once 'class/mAuto.php';
    require_once 'class/cAuto.php';
    require_once 'class/vAuto.php';

    $autoProva = new mAuto( 'Fiat', 'Panda', 2015, 'AB123CD' );

    $controllerAuto = new cAuto();
    $controllerAuto->aggiungiAuto( $autoProva );
    $controllerAuto->aggiungiAuto( new mAuto( 'Ford', 'Focus', 2018, 'EF456GH' ) );
    $controllerAuto->aggiungiAuto( new mAuto( 'Volkswagen', 'Golf', 2020, 'IJ789KL' ) );

    // print_r( $controllerAuto->lista );

    $controllerAuto->rimuoviAuto( 'AB123CD' );

    // print_r( $controllerAuto->lista );

    $viewAuto = new vAuto();

    $viewAuto->mostraListaAuto( $controllerAuto->lista );

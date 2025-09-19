<?php

    require_once 'class/mAuto.php';
    require_once 'class/cAuto.php';
    require_once 'class/vAuto.php';

    require_once 'class/mSosta.php';
    require_once 'class/cSosta.php';
    require_once 'class/vSosta.php';

    require_once 'class/mParcheggio.php';

    $auto = new cAuto();

    $auto->aggiungiAuto( new mAuto( 'Fiat', 'Panda', 2015, 'AB123CD' ) );
    $auto->aggiungiAuto( new mAuto( 'Ford', 'Focus', 2018, 'EF456GH' ) );
    $auto->aggiungiAuto( new mAuto( 'Volkswagen', 'Golf', 2020, 'GH789IJ' ) );

    $parcheggio = new mParcheggio( 'Parcheggio Centro', 2.5 );

    $parcheggio->soste->iniziaSosta( $auto->trovaAuto( 'AB123CD' ) );
    $parcheggio->soste->iniziaSosta( $auto->trovaAuto( 'EF456GH' ) );

    $parcheggio->soste->terminaSosta( $auto->trovaAuto( 'AB123CD' ), '2025-09-19 22:30:00' );

    print_r( $parcheggio->soste->lista );

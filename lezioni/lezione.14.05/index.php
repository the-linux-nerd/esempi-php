<?php

    require 'class/algebra.php';
    require 'class/geometria.php';

    echo 'Il valore di PIGRECO è: ' . Matematica\Algebra::PIGRECO . '<br>';
    echo 'La somma di 5 e 10 è: ' . Matematica\Algebra::somma(5, 10) . '<br>';

    echo 'L\'area di un cerchio di raggio 5 è: ' . Matematica\Geometria::areaCerchio(5) . '<br>';

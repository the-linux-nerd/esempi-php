<?php

    $x = array(
        0 => array(
            'a' => 1,
            'b' => 2,
            'c' => 3
        ),
        1 => array(
            'a' => 4,
            'b' => 5,
            'c' => array(
                'd' => 6.1,
                'e' => 6.2
            )
        ),
        2 => array(
            'a' => 7,
            'b' => 8,
            'c' => 9
        )
    );

    print_r($x);

    echo $x[1]['a'];

    echo PHP_EOL;

    print_r($x[1]);

    echo PHP_EOL;

    echo $x[1]['c']['d'];
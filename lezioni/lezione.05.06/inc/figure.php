<?php

    $form = array(
        'selectFigure' => array(
            'options' => array(
                '1' => 'triangolo',
                '2' => 'rettangolo',
                '3' => 'cerchio'
            )
        )
    );

    $output = creaSelect('{{selectFigure}}', $form['selectFigure']['options'], $output);

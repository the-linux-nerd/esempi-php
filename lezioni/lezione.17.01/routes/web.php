<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/lista', function () {
    return view('lista',[
        'lista' => [
            'Fabio',
            'Luca',
            'Marco',
            'Giovanni',
            'Francesco'
        ]
    ]);
});

Route::get('/ciao', function () {
    return view('ciao', ['name' => 'Fabio']);
});

Route::get('/ciao/{name}', function ($name) {
    return view('ciao', ['name' => $name]);
});

Route::get('/ciao/{name}/bio', function ($name) {
    $biografie = [
        'Fabio' => 'Fabio is a developer from Italy.',
        'Luca' => 'Luca loves hiking and outdoor adventures.',
        'Marco' => 'Marco is a passionate photographer.',
        'Giovanni' => 'Giovanni enjoys cooking and traveling.',
        'Francesco' => 'Francesco is a music enthusiast.'
    ];
    return view('bio', ['name' => $name, 'bio' => $biografie[$name] ?? '']);
});

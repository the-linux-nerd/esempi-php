<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/form', function () {
    return view('form');
});

Route::post('/submit-form', function (\Illuminate\Http\Request $request) {
    $name = $request->input('name');
    $bio = $request->input('bio');
    return view('submit-form', ['name' => $name, 'bio' => $bio]);
});

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

Route::get('/form-somma', function () {
    return view('form-somma');
});

Route::post('/submit-somma', function (\Illuminate\Http\Request $request) {
    $num1 = $request->input('num1');
    $num2 = $request->input('num2');
    $somma = $num1 + $num2;
    return view('submit-somma', ['num1' => $num1, 'num2' => $num2, 'somma' => $somma]);
});

<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/companies', function () {
    return 'Lista de companies';
});

Route::get('/companies/{id}', function () {
    return 'una sola companie';
});

Route::post('/companies', function () {
    return 'crear';
});

Route::put('/companies/{id}', function () {
    return 'actualizar';
});

Route::delete('/companies/{id}', function () {
    return 'eliminar';
});
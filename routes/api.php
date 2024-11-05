<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CompanyController;

Route::get('/companies', [CompanyController::class, 'index']);

Route::get('/companies/{id}', function () {
    return 'una sola companie';
});

Route::post('/companies', [CompanyController::class, 'store']);

Route::put('/companies/{id}', function () {
    return 'actualizar';
});

Route::delete('/companies/{id}', function () {
    return 'eliminar';
});
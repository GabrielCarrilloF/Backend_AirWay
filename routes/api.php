<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\AuthenticationController;

Route::get('/companies', [CompanyController::class, 'index']);

Route::post('/aut', [AuthenticationController::class, 'store']);

Route::post('/companies', [CompanyController::class, 'store']);

Route::get('/docs', function () {
    return view('welcome');
});

Route::put('/companies/{id}', function () {
    return 'actualizar';
});

Route::delete('/companies/{id}', function () {
    return 'eliminar';
});
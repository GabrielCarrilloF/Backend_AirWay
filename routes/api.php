<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\AuthenticationController;


Route::get('/companies', [CompanyController::class, 'index']);

Route::post('/companies', [CompanyController::class, 'store']);

Route::put('/companies/{id}', function () {
    return 'actualizar';
});


Route::post('/aut', [AuthenticationController::class, 'store']);
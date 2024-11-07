<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\AuthenticationController;


Route::get('/companies', [CompanyController::class, 'index']);

Route::get('/companies/{id}', [CompanyController::class, 'show']);

Route::post('/companies', [CompanyController::class, 'store']);

Route::put('/companies/{id}', [CompanyController::class, 'update']);

Route::patch('/companies/{id}', [CompanyController::class, 'updatePatch']);



// Route::get('/auth', [AuthenticationController::class, 'index']);

Route::post('/auth', [AuthenticationController::class, 'store']);



Route::post('/auth/login', [AuthenticationController::class, 'authenticate']);
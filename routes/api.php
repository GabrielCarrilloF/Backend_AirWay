<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\PaymentController;

Route::get('/companies', [CompanyController::class, 'index']);

Route::get('/companies/{id}', [CompanyController::class, 'show']);

Route::post('/companies/create', [CompanyController::class, 'store']);

<<<<<<< HEAD
Route::get('/docs', function () {
    return view('welcome');
});

Route::put('/companies/{id}', function () {
    return 'actualizar';
});
=======
Route::put('/companies/update/{id}', [CompanyController::class, 'update']);
>>>>>>> aaa5e3fe3009f250f1f58edb430d2dafe9c00f94

Route::patch('/companies/updatePatch/{id}', [CompanyController::class, 'updatePatch']);




Route::get('/plan', [PlanController::class, 'index']);

Route::get('/plan/{id}', [PlanController::class, 'show']);




// Route::get('/auth', [AuthenticationController::class, 'index']);

Route::post('/auth/create', [AuthenticationController::class, 'store']);

Route::post('/auth/login', [AuthenticationController::class, 'authenticate']);

Route::patch('/auth/update/{id}', [AuthenticationController::class, 'update']);




Route::post('/payments/create', [PaymentController::class, 'store']);
Route::get('/payments/{id}', [PaymentController::class, 'show']);

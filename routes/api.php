<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\RoomController;

Route::get('/companies', [CompanyController::class, 'index']);

Route::get('/companies/{id}', [CompanyController::class, 'show']);

Route::post('/companies/create', [CompanyController::class, 'store']);

Route::put('/companies/update/{id}', [CompanyController::class, 'update']);

Route::patch('/companies/updatePatch/{id}', [CompanyController::class, 'updatePatch']);

Route::get('/docs', function () {
    return view('welcome');
});


Route::get('/plan', [PlanController::class, 'index']);

Route::get('/plan/{id}', [PlanController::class, 'show']);




// Route::get('/auth', [AuthenticationController::class, 'index']);

Route::post('/auth/create', [AuthenticationController::class, 'store']);

Route::post('/auth/login', [AuthenticationController::class, 'authenticate']);

Route::patch('/auth/update/{id}', [AuthenticationController::class, 'update']);


Route::post('/payments/create', [PaymentController::class, 'store']);
Route::get('/payments/{id}', [PaymentController::class, 'show']);


Route::post('/room/create', [RoomController::class, 'store']);
Route::get('/room/all/{id}', [RoomController::class, 'index']);
Route::get('/room/{id}', [RoomController::class, 'show']);
Route::patch('/room/update', [RoomController::class, 'update']);
Route::delete('/room/delete/{id}', [RoomController::class, 'destroy']);
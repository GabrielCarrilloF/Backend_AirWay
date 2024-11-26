<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\HotelOffersController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\TransportationOfferController;
use App\Http\Controllers\CompanyProfileImageController;
use App\Http\Controllers\ReservasController;

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


Route::get('/auth', [AuthenticationController::class, 'index']);
Route::post('/auth/create', [AuthenticationController::class, 'store']);
Route::post('/auth/login', [AuthenticationController::class, 'authenticate']);
Route::patch('/auth/update/{id}', [AuthenticationController::class, 'update']);


Route::post('/payments/create', [PaymentController::class, 'store']);
Route::get('/payments/{id}', [PaymentController::class, 'show']);


Route::post('/room/create', [RoomController::class, 'store']);
Route::get('/room/all/{id}', [RoomController::class, 'index']);
Route::get('/room/{id}', [RoomController::class, 'show']);
Route::patch('/room/update/{id}', [RoomController::class, 'update']);
Route::delete('/room/delete/{id}', [RoomController::class, 'destroy']);



Route::get('/hotel_offers', [HotelOffersController::class, 'index']); 
Route::get('/hotel_offers/{id}', [HotelOffersController::class, 'show']); 
Route::post('/hotel_offers/create', [HotelOffersController::class, 'store']);
Route::patch('/hotel_offers/update/{id}', [HotelOffersController::class, 'update']);
Route::delete('/hotel_offers/delete/{id}', [HotelOffersController::class, 'destroy']);

Route::post('/search-offers', [OfferController::class, 'searchOffers']);


Route::post('/vehicles/create', [VehicleController::class, 'store']);
Route::get('/vehicles/all/{vehicle_registration}', [VehicleController::class, 'show']);
Route::get('/vehicles/{vehicle_registration}', [VehicleController::class, 'showVivle']);
Route::patch('/vehicles/update/{vehicle_registration}', [VehicleController::class, 'update']);
Route::delete('/vehicles/delete/{vehicle_registration}', [VehicleController::class, 'destroy']);



Route::post('/transport_offers/create', [TransportationOfferController::class, 'store']);
Route::get('/transport_offers/{id_vehicle}', [TransportationOfferController::class, 'show']);
Route::patch('/transport_offers/update/{id}', [TransportationOfferController::class, 'update']);
Route::delete('/transport_offers/delete/{id}', [TransportationOfferController::class, 'destroy']);


Route::post('/images/create', [CompanyProfileImageController::class, 'store']);
Route::patch('/images/update/{id}', [CompanyProfileImageController::class, 'update']);
Route::delete('/images/delete/{id}', [CompanyProfileImageController::class, 'destroy']);




// Listar todas las reservas de una compañía específica
Route::get('/reservas/all', [ReservasController::class, 'index']);

// Mostrar una reserva específica por offerCode y validar que pertenece a companyName
Route::get('/reservas/only/{offerCode}', [ReservasController::class, 'show']);

// Crear una nueva reserva
Route::POST('/reservas/create', [ReservasController::class, 'store']);

// Actualizar una reserva existente
Route::patch('/reservas/update/{offerCode}', [ReservasController::class, 'update']);

// Eliminar una reserva existente
Route::delete('/reservas/delete/{offerCode}', [ReservasController::class, 'destroy']);


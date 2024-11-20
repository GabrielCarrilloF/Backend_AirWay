<?php

namespace App\Http\Controllers;

use App\Helpers\HotelOffersValidationHelpers;
use App\Models\HotelOffers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HotelOffersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $offers = HotelOffers::all();
        return response()->json($offers, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'company_id' => HotelOffersValidationHelpers::validateCompanyId()['rules'],
            'room_id' => HotelOffersValidationHelpers::validateRoomId($data)['rules'],
            'price_per_night' => HotelOffersValidationHelpers::validatePricePerNight()['rules'],
            'available_from' => HotelOffersValidationHelpers::validateAvailableFrom()['rules'],
            'available_until' => HotelOffersValidationHelpers::validateAvailableUntil()['rules'],

        ], array_merge(
            HotelOffersValidationHelpers::validateCompanyId()['messages'],
            HotelOffersValidationHelpers::validateRoomId($data)['messages'],
            HotelOffersValidationHelpers::validatePricePerNight()['messages'],
            HotelOffersValidationHelpers::validateAvailableFrom()['messages'],
            HotelOffersValidationHelpers::validateAvailableUntil()['messages'],
        ));

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Error de validación',
                'errors' => $validator->errors()
            ], 422);
        }

        $offer = HotelOffers::create($data);

        if (!$offer) {
            return response()->json([
                'message' => 'Error al crear la oferta de hotel',
                'status' => 500
            ], 500);
        }

        return response()->json([
            'message' => 'Oferta de hotel creada exitosamente',
            'offer' => $offer,
            'status' => 201
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $offer = HotelOffers::find($id);

        if (!$offer) {
            return response()->json([
                'message' => 'Oferta de hotel no encontrada',
                'status' => 404
            ], 404);
        }

        return response()->json($offer, 200);
    }

    /** 
        * Update the specified resource in storage.
    */
    public function update(Request $request, $id)
    {
        $offer = HotelOffers::find($id);
    
        if (!$offer) {
            return response()->json([
                'message' => 'Oferta de hotel no encontrada',
                'status' => 404
            ], 404);
        }
    
        $data = $request->all();
    
       
        $rules = [];
        $messages = [];
    
        if ($request->has('company_id')) {
            $rules['company_id'] = HotelOffersValidationHelpers::validateCompanyId()['rules'];
            $messages = array_merge($messages, HotelOffersValidationHelpers::validateCompanyId()['messages']);
        }
    
        if ($request->has('room_id')) {
            $rules['room_id'] = HotelOffersValidationHelpers::validateRoomId($data)['rules'];
            $messages = array_merge($messages, HotelOffersValidationHelpers::validateRoomId($data)['messages']);
        }
    
        if ($request->has('price_per_night')) {
            $rules['price_per_night'] = HotelOffersValidationHelpers::validatePricePerNight()['rules'];
            $messages = array_merge($messages, HotelOffersValidationHelpers::validatePricePerNight()['messages']);
        }
    
        if ($request->has('available_from')) {
            $rules['available_from'] = HotelOffersValidationHelpers::validateAvailableFrom()['rules'];
            $messages = array_merge($messages, HotelOffersValidationHelpers::validateAvailableFrom()['messages']);
        }
    
        if ($request->has('available_until')) {
            $rules['available_until'] = HotelOffersValidationHelpers::validateAvailableUntil()['rules'];
            $messages = array_merge($messages, HotelOffersValidationHelpers::validateAvailableUntil()['messages']);
        }
    
        
        $validator = Validator::make($data, $rules, $messages);
    
        if ($validator->fails()) {
            return response()->json([
                'message' => 'Datos de actualización inválidos',
                'errors' => $validator->errors(),
                'status' => 400
            ], 400);
        }
    
       
        if ($request->has('company_id')) {
            $offer->company_id = $data['company_id'];
        }
        if ($request->has('room_id')) {
            $offer->room_id = $data['room_id'];
        }
        if ($request->has('price_per_night')) {
            $offer->price_per_night = $data['price_per_night'];
        }
        if ($request->has('available_from')) {
            $offer->available_from = $data['available_from'];
        }
        if ($request->has('available_until')) {
            $offer->available_until = $data['available_until'];
        }
    
       
        $offer->save();
    
        return response()->json([
            'message' => 'Oferta de hotel actualizada exitosamente',
            'offer' => $offer,
            'status' => 200
        ], 200);
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $offer = HotelOffers::find($id);

        if (!$offer) {
            return response()->json([
                'message' => 'Oferta de hotel no encontrada',
                'status' => 404
            ], 404);
        }

        $offer->delete();

        return response()->json([
            'message' => 'Oferta de hotel eliminada exitosamente',
            'status' => 200
        ], 200);
    }
}

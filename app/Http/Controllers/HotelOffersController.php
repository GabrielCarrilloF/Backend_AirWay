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
            'hotel_name' => HotelOffersValidationHelpers::validateHotelName()['rules'],
            'price_per_night' => HotelOffersValidationHelpers::validatePricePerNight()['rules'],
            'location' => HotelOffersValidationHelpers::validateLocation()['rules'],
            'availability' => HotelOffersValidationHelpers::validateAvailability()['rules'],
            'amenities' => HotelOffersValidationHelpers::validateAmenities()['rules'],
            'photos' => HotelOffersValidationHelpers::validatePhotos()['rules'],
        ], array_merge(
            HotelOffersValidationHelpers::validateHotelName()['messages'],
            HotelOffersValidationHelpers::validatePricePerNight()['messages'],
            HotelOffersValidationHelpers::validateLocation()['messages'],
            HotelOffersValidationHelpers::validateAvailability()['messages'],
            HotelOffersValidationHelpers::validateAmenities()['messages'],
            HotelOffersValidationHelpers::validatePhotos()['messages']
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
        
        $validator = Validator::make($data, [
            'hotel_name' => $request->has('hotel_name') ? HotelOffersValidationHelpers::validateHotelName()['rules'] : '',
            'price_per_night' => $request->has('price_per_night') ? HotelOffersValidationHelpers::validatePricePerNight()['rules'] : '',
            'location' => $request->has('location') ? HotelOffersValidationHelpers::validateLocation()['rules'] : '',
            'availability' => $request->has('availability') ? HotelOffersValidationHelpers::validateAvailability()['rules'] : '',
            'amenities' => $request->has('amenities') ? HotelOffersValidationHelpers::validateAmenities()['rules'] : '',
            'photos' => $request->has('photos') ? HotelOffersValidationHelpers::validatePhotos()['rules'] : '',
        ], array_merge(
            HotelOffersValidationHelpers::validateHotelName()['messages'],
            HotelOffersValidationHelpers::validatePricePerNight()['messages'],
            HotelOffersValidationHelpers::validateLocation()['messages'],
            HotelOffersValidationHelpers::validateAvailability()['messages'],
            HotelOffersValidationHelpers::validateAmenities()['messages'],
            HotelOffersValidationHelpers::validatePhotos()['messages']
        ));

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Datos de actualización inválidos',
                'errors' => $validator->errors(),
                'status' => 400
            ], 400);
        }

        $offer->update($data);

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

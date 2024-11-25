<?php

namespace App\Http\Controllers;

use App\Models\TransportationOffer;
use Illuminate\Http\Request;
use App\Helpers\TransportationOffersValidationHelpers;
use Illuminate\Support\Facades\Validator;

class TransportationOfferController extends Controller
{
    
    public function index()
    {
        
    }


   
    public function store(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'id_vehicle' => TransportationOffersValidationHelpers::validateIdVehicle()['rules'],
            'origin' => TransportationOffersValidationHelpers::validateOrigin()['rules'],
            'destination' => TransportationOffersValidationHelpers::validateDestination()['rules'],
            'departure_date' => TransportationOffersValidationHelpers::validateDepartureDate()['rules'],
            'arrival_date' => TransportationOffersValidationHelpers::validateArrivalDate()['rules'],
            'departure_time' => TransportationOffersValidationHelpers::validateDepartureTime()['rules'],
            'arrival_time' => TransportationOffersValidationHelpers::validateArrivalTime()['rules'],
            'price' => TransportationOffersValidationHelpers::validatePrice()['rules'],
            'previous_price' => TransportationOffersValidationHelpers::validatePreviousPrice()['rules'],
            'additional_information' => TransportationOffersValidationHelpers::validateAdditionalInformation()['rules'],
        ], array_merge(
            TransportationOffersValidationHelpers::validateIdVehicle()['messages'],
            TransportationOffersValidationHelpers::validateOrigin()['messages'],
            TransportationOffersValidationHelpers::validateDestination()['messages'],
            TransportationOffersValidationHelpers::validateDepartureDate()['messages'],
            TransportationOffersValidationHelpers::validateArrivalDate()['messages'],
            TransportationOffersValidationHelpers::validateDepartureTime()['messages'],
            TransportationOffersValidationHelpers::validateArrivalTime()['messages'],
            TransportationOffersValidationHelpers::validatePrice()['messages'],
            TransportationOffersValidationHelpers::validatePreviousPrice()['messages'],
            TransportationOffersValidationHelpers::validateAdditionalInformation()['messages']
        ));

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Error de validación',
                'errors' => $validator->errors()
            ], 422);
        }

        
        $offer = TransportationOffer::create($data);

        if (!$offer) {
            return response()->json([
                'message' => 'Error al crear la oferta de transporte',
                'status' => 500
            ], 500);
        }

        return response()->json([
            'message' => 'Oferta de transporte creada exitosamente',
            'offer' => $offer,
            'status' => 201
        ], 201);
    }

   
    public function show($id_vehicle)
    {
        $offers = TransportationOffer::where('id_vehicle', $id_vehicle)->get();

        if ($offers->isEmpty()) {
            return response()->json([
                'message' => 'No se encontraron ofertas asociadas al vehículo especificado.',
            ], 404);
        }

        return response()->json([
            'message' => 'Ofertas encontradas',
            'offers' => $offers,
            'status' => 200
        ], 200);
    }


    public function update(Request $request, $id)
{
    $offer = TransportationOffer::find($id);

    if (!$offer) {
        return response()->json([
            'message' => 'Oferta de transporte no encontrada',
            'status' => 404
        ], 404);
    }

    $data = $request->all();

    
    $rules = [];
    $messages = [];

    if ($request->has('id_vehicle')) {
        $rules['id_vehicle'] = TransportationOffersValidationHelpers::validateIdVehicle()['rules'];
        $messages = array_merge($messages, TransportationOffersValidationHelpers::validateIdVehicle()['messages']);
    }

    if ($request->has('origin')) {
        $rules['origin'] = TransportationOffersValidationHelpers::validateOrigin()['rules'];
        $messages = array_merge($messages, TransportationOffersValidationHelpers::validateOrigin()['messages']);
    }

    if ($request->has('destination')) {
        $rules['destination'] = TransportationOffersValidationHelpers::validateDestination()['rules'];
        $messages = array_merge($messages, TransportationOffersValidationHelpers::validateDestination()['messages']);
    }

    if ($request->has('departure_date')) {
        $rules['departure_date'] = TransportationOffersValidationHelpers::validateDepartureDate()['rules'];
        $messages = array_merge($messages, TransportationOffersValidationHelpers::validateDepartureDate()['messages']);
    }

    if ($request->has('arrival_date')) {
        $rules['arrival_date'] = TransportationOffersValidationHelpers::validateArrivalDate()['rules'];
        $messages = array_merge($messages, TransportationOffersValidationHelpers::validateArrivalDate()['messages']);
    }

    if ($request->has('price')) {
        $rules['price'] = TransportationOffersValidationHelpers::validatePrice()['rules'];
        $messages = array_merge($messages, TransportationOffersValidationHelpers::validatePrice()['messages']);
    }

    // Validar datos
    $validator = Validator::make($data, $rules, $messages);

    if ($validator->fails()) {
        return response()->json([
            'message' => 'Datos de actualización inválidos',
            'errors' => $validator->errors(),
            'status' => 400
        ], 400);
    }

    if ($request->has('id_vehicle')) {
        $offer->id_vehicle = $data['id_vehicle'];
    }
    if ($request->has('origin')) {
        $offer->origin = $data['origin'];
    }
    if ($request->has('destination')) {
        $offer->destination = $data['destination'];
    }
    if ($request->has('departure_date')) {
        $offer->departure_date = $data['departure_date'];
    }
    if ($request->has('arrival_date')) {
        $offer->arrival_date = $data['arrival_date'];
    }
    if ($request->has('price')) {
        $offer->price = $data['price'];
    }

    $offer->save();

    return response()->json([
        'message' => 'Oferta de transporte actualizada exitosamente',
        'offer' => $offer,
        'status' => 200
    ], 200);
}


    
    public function destroy($id)
    {
        $offer = TransportationOffer::find($id);

        if (!$offer) {
            return response()->json([
                'message' => 'Oferta de transporte no encontrada',
            ], 404);
        }

        $offer->delete();

        return response()->json([
            'message' => 'Oferta de transporte eliminada exitosamente',
        ], 200);
    }
}

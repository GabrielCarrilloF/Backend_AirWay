<?php

namespace App\Http\Controllers;

use App\Models\HotelOffers;
use App\Models\TransportationOffer;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    /**
     * Search for offers based on the given filters.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function searchOffers(Request $request)
    {
        // Validar los datos recibidos
        $validated = $request->validate([
            'origin' => 'nullable|string',
            'destination' => 'nullable|string',
            'departure_date' => 'nullable|date',
            'type' => 'required|string|in:hotel,transportation',
            'vehicle_type' => 'nullable|string|in:bus,airplane', // Nuevo campo para el tipo de vehículo
        ]);

        $type = $validated['type'];

        if ($type === 'hotel') {
            // Buscar ofertas de hoteles
            $offers = HotelOffers::query()
                ->whereDate('available_from', '<=', $validated['departure_date'])
                ->whereDate('available_until', '>=', $validated['departure_date'])
                ->get();

        } elseif ($type === 'transportation') {
            // Buscar ofertas de transporte terrestre o vuelos
            $offers = TransportationOffer::query()
                ->when(isset($validated['origin']), function ($query) use ($validated) {
                    $query->where('origin', $validated['origin']);
                })
                ->when(isset($validated['destination']), function ($query) use ($validated) {
                    $query->where('destination', $validated['destination']);
                })
                ->when(isset($validated['departure_date']), function ($query) use ($validated) {
                    $query->whereDate('departure_date', $validated['departure_date']);
                })
                ->when(isset($validated['vehicle_type']), function ($query) use ($validated) {
                    // Filtrar por tipo de vehículo: bus o avión
                    $query->whereHas('vehicle', function ($vehicleQuery) use ($validated) {
                        $vehicleQuery->where('vehicle_type', $validated['vehicle_type']);
                    });
                })
                ->get();
        } else {
            // Si el tipo no coincide, devolver error
            return response()->json(['error' => 'Invalid type provided'], 400);
        }

        return response()->json([
            'success' => true,
            'data' => $offers,
        ]);
    }
}

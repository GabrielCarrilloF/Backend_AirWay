<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use App\Models\Reservas;
use Illuminate\Http\Request;

class ReservasController extends Controller
{
    /**
     * Listar todas las reservas pertenecientes a una compañía específica.
     */
    public function index(Request $request)
    {
        $companyName = $request->input('companyName');
        
        if (!$companyName) {
            return response()->json(['error' => 'El campo companyName es obligatorio.'], 400);
        }

        $reservas = Reservas::where('companyName', $companyName)->get();

        return response()->json($reservas, 200);
    }

    /**
     * Mostrar una reserva específica basada en offerCode y validar que pertenece a la compañía.
     */
    public function show(Request $request, $offerCode)
    {
        $companyName = $request->input('companyName');

        if (!$companyName) {
            return response()->json(['error' => 'El campo companyName es obligatorio.'], 400);
        }

        $reserva = Reservas::where('offerCode', $offerCode)
            ->where('companyName', $companyName)
            ->first();

        if (!$reserva) {
            return response()->json(['error' => 'No se encontró una reserva con ese offerCode y companyName.'], 404);
        }

        return response()->json($reserva, 200);
    }

    /**
     * Crear una nueva reserva.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre_usuario' => 'required|string|max:255',
            'identificacion_usuario' => 'required|string|max:255',
            'correo_usuario' => 'required|email|unique:reservas,correo_usuario',
            'edad_usuario' => 'required|integer|min:18',
            'telefono_usuario' => 'required|string|max:10|min:10',
            'id_offer' => 'required|exists:transportation_offers,id',
            'companyName' => 'required|exists:company,name',
        ]);

        $reserva = Reservas::create([
            'offerCode' => (string) \Illuminate\Support\Str::uuid(),
            'nombre_usuario' => $validated['nombre_usuario'],
            'identificacion_usuario' => $validated['identificacion_usuario'],
            'correo_usuario' => $validated['correo_usuario'],
            'edad_usuario' => $validated['edad_usuario'],
            'telefono_usuario' => $validated['telefono_usuario'],
            'id_offer' => $validated['id_offer'],
            'companyName' => $validated['companyName'],
        ]);

        return response()->json($reserva, 201);
    }

    /**
     * Actualizar una reserva existente.
     */
    public function update(Request $request, $offerCode)
    {
        $companyName = $request->input('companyName');

        if (!$companyName) {
            return response()->json(['error' => 'El campo companyName es obligatorio.'], 400);
        }

        $reserva = Reservas::where('offerCode', $offerCode)
            ->where('companyName', $companyName)
            ->first();

        if (!$reserva) {
            return response()->json(['error' => 'No se encontró una reserva con ese offerCode y companyName.'], 404);
        }

        $validated = $request->validate([
            'nombre_usuario' => 'string|max:255',
            'identificacion_usuario' => 'string|max:255',
            'correo_usuario' => 'email|unique:reservas,correo_usuario,' . $reserva->id,
            'edad_usuario' => 'integer|min:0',
            'telefono_usuario' => 'string|max:255',
            'id_offer' => 'exists:transportation_offers,id',
            'companyName' => 'exists:company,name',
        ]);

        $reserva->update($validated);

        return response()->json($reserva, 200);
    }

    /**
     * Eliminar una reserva existente.
     */
    public function destroy(Request $request, $offerCode)
    {
        $companyName = $request->input('companyName');

        if (!$companyName) {
            return response()->json(['error' => 'El campo companyName es obligatorio.'], 400);
        }

        $reserva = Reservas::where('offerCode', $offerCode)
            ->where('companyName', $companyName)
            ->first();

        if (!$reserva) {
            return response()->json(['error' => 'No se encontró una reserva con ese offerCode y companyName.'], 404);
        }

        $reserva->delete();

        return response()->json(['message' => 'Reserva eliminada con éxito.'], 200);
    }
}

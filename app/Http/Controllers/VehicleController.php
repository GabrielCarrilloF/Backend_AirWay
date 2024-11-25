<?php

namespace App\Http\Controllers;
use App\Helpers\VehiclesValidationHelpers;
use App\Models\Company;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class VehicleController extends Controller
{

    public function index()
    {
       
    }

   
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'vehicle_registration' => VehiclesValidationHelpers::validateVehicleRegistration()['rules'],
            'company_id' => VehiclesValidationHelpers::validateCompanyId()['rules'],
            'vehicle_model' => VehiclesValidationHelpers::validateVehicleModel()['rules'],
            'total_seats' => VehiclesValidationHelpers::validateTotalSeats()['rules'],
            'occupied_seats' => VehiclesValidationHelpers::validateOccupiedSeats()['rules'],
            'vehicle_status' => VehiclesValidationHelpers::validateVehicleStatus()['rules'],
            'vehicle_type' => VehiclesValidationHelpers::validateVehicleType()['rules'],
            'amenities' => VehiclesValidationHelpers::validateAmenities()['rules'],
        ], array_merge(
            VehiclesValidationHelpers::validateVehicleRegistration()['messages'],
            VehiclesValidationHelpers::validateCompanyId()['messages'],
            VehiclesValidationHelpers::validateVehicleModel()['messages'],
            VehiclesValidationHelpers::validateTotalSeats()['messages'],
            VehiclesValidationHelpers::validateOccupiedSeats()['messages'],
            VehiclesValidationHelpers::validateVehicleStatus()['messages'],
            VehiclesValidationHelpers::validateVehicleType()['messages'],
            VehiclesValidationHelpers::validateAmenities()['messages']
        ));

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Bad Request: Datos inválidos.',
                'errors' => $validator->errors(),
                'status' => 400
            ], 400);
        }

        $vehicle = Vehicle::create([
        'vehicle_registration' => $request->vehicle_registration,
        'company_id' => $request->company_id,
        'vehicle_model' => $request->vehicle_model,
        'total_seats' => $request->total_seats,
        'occupied_seats' => $request->occupied_seats,
        'amenities' => $request->amenities,
        'vehicle_status' => $request->vehicle_status,
        'vehicle_type' => $request->vehicle_type,
    ]);

    if (!$vehicle) {
            return response()->json([
                'message' => 'Internal Server Error: No se pudo crear una nuevo vehiculo',
                'status' => 500
            ], 500);
        }

        return response()->json([
            'message' => 'Vehículo creado exitosamente.',
            'vehicle' => $vehicle,
            'status' => 201
        ], 201);
        
    }

    /**
     * Display the specified resource.
     */
    public function show($vehicle_registration)
    {
        
       $company = Company::find($vehicle_registration);
        if (!$company) {
            return response()->json(['error' => 'Company not found'], 404);
        }

        // Obtén los vehiculos asociados a la compañía
        $Vehicles = Vehicle::where('company_id', $vehicle_registration)->get();

        return response()->json([
            'company' => $company->name,
            'Vehicles' => $Vehicles
        ], 200);
    }

    public function showVivle($vehicle_registration)
    {
        
       $Vehicles = Vehicle::find($vehicle_registration);
        if (!$Vehicles) {
            return response()->json(['error' => 'Vehicle not found'], 404);
        }

        // Obtén los vehiculos asociados a la compañía
        $Vehicles = Vehicle::where('vehicle_registration', $vehicle_registration)->get();

        return response()->json([
            'Vehicles' => $Vehicles
        ], 200);
    }

    
    public function update(Request $request, $vehicle_registration)
    {
        $vehicle = Vehicle::find($vehicle_registration);

        if (!$vehicle) {
            return response()->json([
                'message' => 'Vehículo no encontrado.', 
                'status' => 404
            ], 404);
        }

        if ($request->has('vehicle_model')) {
        $validator = Validator::make($request->all(), [
            'vehicle_model' => VehiclesValidationHelpers::validateVehicleModel()['rules']
        ], array_merge(
         VehiclesValidationHelpers::validateVehicleModel()['messages']
    ));

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Bad Request: Datos errados para vehicle_model',
                'errors' => $validator->errors(),
                'status' => 400
            ], 400);
        }
        $vehicle->vehicle_model = $request->vehicle_model;
    }

    if ($request->has('total_seats')) {
        $validator = Validator::make($request->all(), [
            'total_seats' => VehiclesValidationHelpers::validateTotalSeats()['rules']

        ], array_merge(

        VehiclesValidationHelpers::validateTotalSeats()['messages']
    ));

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Bad Request: Datos errados para total_seats',
                'errors' => $validator->errors(),
                'status' => 400
            ], 400);
        }
        $vehicle->total_seats = $request->total_seats;
    }

    if ($request->has('occupied_seats')) {
        $validator = Validator::make($request->all(), [
            'occupied_seats' => VehiclesValidationHelpers::validateOccupiedSeats()['rules']

        ],array_merge( 
        VehiclesValidationHelpers::validateOccupiedSeats()['messages']

        ));

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Bad Request: Datos errados para occupied_seats',
                'errors' => $validator->errors(),
                'status' => 400
            ], 400);
        }
        $vehicle->occupied_seats = $request->occupied_seats;
    }

    if ($request->has('amenities')) {
        $validator = Validator::make($request->all(), [
            'amenities' => VehiclesValidationHelpers::validateAmenities()['rules']

        ], array_merge(

        VehiclesValidationHelpers::validateAmenities()['messages']
    ));


        if ($validator->fails()) {
            return response()->json([
                'message' => 'Bad Request: Datos errados para amenities',
                'errors' => $validator->errors(),
                'status' => 400
            ], 400);
        }
        $vehicle->amenities = $request->amenities;
    }

    if ($request->has('vehicle_status')) {
        $validator = Validator::make($request->all(), [
            'vehicle_status' => VehiclesValidationHelpers::validateVehicleStatus()['rules']

        ],array_merge( 

        VehiclesValidationHelpers::validateVehicleStatus()['messages']

        ));

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Bad Request: Datos errados para vehicle_status',
                'errors' => $validator->errors(),
                'status' => 400
            ], 400);
        }
        $vehicle->vehicle_status = $request->vehicle_status;
    }

    $vehicle->save();

    return response()->json([
        'message' => 'Vehículo actualizado exitosamente.',
        'vehicle' => $vehicle,
        'status' => 200
    ], 200);

    }

    public function destroy($vehicle_registration)
    {
      $vehicle = Vehicle::find($vehicle_registration);

   
    if (!$vehicle) {
        return response()->json([
            'message' => 'Vehículo no encontrado.',
            'status' => 404
        ], 404);
    }

    
    $vehicle->delete();

    return response()->json([
        'message' => 'Vehículo eliminado exitosamente.',
        'status' => 200
    ], 200);
    }
}

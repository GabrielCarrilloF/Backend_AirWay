<?php

namespace App\Http\Controllers;

use App\Helpers\RoomValidationHelpers;
use App\Models\Company;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RoomController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        
        $validator = Validator::make($data, [
            'room_number' => RoomValidationHelpers::validateRoomNumber($data)['rules'],
            'company_id' => RoomValidationHelpers::validateCompanyId()['rules'],
            'room_type' => RoomValidationHelpers::validateRoomType()['rules'],
            'room_size' => RoomValidationHelpers::validateRoomSize()['rules'],
            'room_capacity' => RoomValidationHelpers::validateRoomCapacity()['rules'],
            'amenities' => RoomValidationHelpers::validateAmenities()['rules'],
            'photos' => RoomValidationHelpers::validatePhotos()['rules'],
            'room_status' => RoomValidationHelpers::validateRoomStatus()['rules'],
        ], array_merge(
            RoomValidationHelpers::validateRoomNumber($data)['messages'],
            RoomValidationHelpers::validateCompanyId()['messages'],
            RoomValidationHelpers::validateRoomType()['messages'],
            RoomValidationHelpers::validateRoomSize()['messages'],
            RoomValidationHelpers::validateRoomCapacity()['messages'],
            RoomValidationHelpers::validateAmenities()['messages'],
            RoomValidationHelpers::validatePhotos()['messages'],
            RoomValidationHelpers::validateRoomStatus()['messages'],
        ));

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Error de validación',
                'errors' => $validator->errors()
            ], 422); 
        }

        $request = Room::create([
            'room_number' => $request->room_number,
            'company_id' => $request->company_id,
            'room_type' => $request->room_type,
            'room_size' => $request->room_size,
            'room_capacity' => $request->room_capacity,
            'amenities' => $request->amenities,
            'photos' => $request->photos,
            'room_status'=> $request->room_status,
            'description'=> $request->description
        ]);

        if (!$request) {
            $data = [
                'message' => 'Internal Server Error: No se pudo crear una nueva habitación',
                'status' => 500
            ];
            return response()->json($data, 500);
        } else {
            return response()->json([
                'message' => 'room created successfully',
                'room' => $request,
                'status' => 201
            ], 201);

        }
    }

    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $company = Company::find($id);
        if (!$company) {
            return response()->json(['error' => 'Company not found'], 404);
        }

        $room = Room::where('company_id', $id)->get();

        return response()->json([
            'company' => $company->name,
            'room' => $room
        ], 200);
    }
    
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $room = Room::find($id);

        if (!$room) {
            return response()->json([
                'message' => 'habitación no encontrada.',
                'status' => 404
            ], 404);
        }

        $data = [
            'room' => $room,
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $room = Room::find($id);

        if (!$room) {
            return response()->json([
                'message' => 'habitación no encontrada.',
                'status' => 404
            ], 404);
        }

        if ($request->has('room_number')) {
            $data = $request->all();
            $validator = Validator::make($request->all(), [
                'room_number' => RoomValidationHelpers::validateRoomNumber($data)['rules']
            ], array_merge(
                RoomValidationHelpers::validateRoomNumber($data)['messages']
            ));
        
            if ($validator->fails()) {
                return response()->json([
                    'message' => 'Bad Request: Datos errados',
                    'errors' => $validator->errors(),
                    'status' => 400
                ], 400);
            }
            $room->room_number = $request->room_number;
        }
        
        
        if ($request->has('room_type')) {
            $data = $request->all();
            $validator = Validator::make($request->all(), [
                'room_type' => RoomValidationHelpers::validateRoomType($data)['rules']
            ], array_merge(
                RoomValidationHelpers::validateRoomType($data)['messages']
            ));
        
            if ($validator->fails()) {
                return response()->json([
                    'message' => 'Bad Request: Datos errados',
                    'errors' => $validator->errors(),
                    'status' => 400
                ], 400);
            }
            $room->room_type = $request->room_type;
        }
        
        if ($request->has('room_size')) {
            $data = $request->all();
            $validator = Validator::make($request->all(), [
                'room_size' => RoomValidationHelpers::validateRoomSize($data)['rules']
            ], array_merge(
                RoomValidationHelpers::validateRoomSize($data)['messages']
            ));
        
            if ($validator->fails()) {
                return response()->json([
                    'message' => 'Bad Request: Datos errados',
                    'errors' => $validator->errors(),
                    'status' => 400
                ], 400);
            }
            $room->room_size = $request->room_size;
        }
        
        if ($request->has('room_capacity')) {
            $data = $request->all();
            $validator = Validator::make($request->all(), [
                'room_capacity' => RoomValidationHelpers::validateRoomCapacity($data)['rules']
            ], array_merge(
                RoomValidationHelpers::validateRoomCapacity($data)['messages']
            ));
        
            if ($validator->fails()) {
                return response()->json([
                    'message' => 'Bad Request: Datos errados',
                    'errors' => $validator->errors(),
                    'status' => 400
                ], 400);
            }
            $room->room_capacity = $request->room_capacity;
        }
        
        if ($request->has('amenities')) {
            $data = $request->all();
            $validator = Validator::make($request->all(), [
                'amenities' => RoomValidationHelpers::validateAmenities($data)['rules']
            ], array_merge(
                RoomValidationHelpers::validateAmenities($data)['messages']
            ));
        
            if ($validator->fails()) {
                return response()->json([
                    'message' => 'Bad Request: Datos errados',
                    'errors' => $validator->errors(),
                    'status' => 400
                ], 400);
            }
            $room->amenities = $request->amenities;
        }
        
        if ($request->has('photos')) {
            $data = $request->all();
            $validator = Validator::make($request->all(), [
                'photos' => RoomValidationHelpers::validatePhotos($data)['rules']
            ], array_merge(
                RoomValidationHelpers::validatePhotos($data)['messages']
            ));
        
            if ($validator->fails()) {
                return response()->json([
                    'message' => 'Bad Request: Datos errados',
                    'errors' => $validator->errors(),
                    'status' => 400
                ], 400);
            }
            $room->photos = $request->photos;
        }
        
        if ($request->has('room_status')) {
            $data = $request->all();
            $validator = Validator::make($request->all(), [
                'room_status' => RoomValidationHelpers::validateRoomStatus($data)['rules']
            ], array_merge(
                RoomValidationHelpers::validateRoomStatus($data)['messages']
            ));
        
            if ($validator->fails()) {
                return response()->json([
                    'message' => 'Bad Request: Datos errados',
                    'errors' => $validator->errors(),
                    'status' => 400
                ], 400);
            }
            $room->room_status = $request->room_status;
        }
        
        if ($request->has('description')) {
            $data = $request->all();
            $validator = Validator::make($request->all(), [
                'description' => 'required|string|max:255', 
            ]);
        
            if ($validator->fails()) {
                return response()->json([
                    'message' => 'Bad Request: Datos errados',
                    'errors' => $validator->errors(),
                    'status' => 400
                ], 400);
            }
            $room->description = $request->description;
        }
    
        $room->save();
        
        $data = [
            'message' => 'Habitacion actualizada',
            'room' => $room,
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $room = Room::find($id);

        if (!$room) {
            return response()->json([
                'message' => 'habitación no encontrada.',
                'status' => 404
            ], 404);
        }

        $room->delete();

        $room = Room::find($id);
        if (!$room) {
            return response()->json([
                'message' => 'Habitación eliminada exitosamente.',
                'status' => 200
            ], 200);
        }else{
            return response()->json([
                'message' => 'Error al eliminar la habitación.',
                'status' => 500
            ], 500);
        }

    }

}

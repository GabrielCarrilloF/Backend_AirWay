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
    public function update(Request $request, Room $room)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Room $room)
    {
        //
    }
}

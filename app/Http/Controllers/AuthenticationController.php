<?php

namespace App\Http\Controllers;

use App\Models\authentication;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthenticationController extends Controller
{

    public function store(Request $request)
    {
        $Validator = Validator::make($request->all(), [
            'user_name' => 'required',
            'passaword' => 'required',
            'suppliers' => 'required',
            'last_access_date' => 'required',
            'state' => 'required'
        ]);

        if ($Validator->fails()) {
            $data = [
                'message' => 'Bad Request: Datos errados',
                'error' => $Validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        } else {
            $user = authentication::create([
                'user_name'=> $request->user_name,
                'passaword' => $request->passaword,
                'suppliers' => $request->suppliers,
                'last_access_date' => $request->last_access_date,
                'state' => $request->state
            ]);

            if (!$user) {
                $data = [
                    'message' => 'Internal Server Error: No se pudo crear una nueva compañía',
                    'status' => 500
                ];
                return response()->json($data, 500);
            } else {
                $data = [
                    'user' => $user,
                    'status' => 201
                ];
                return response()->json($data, 201);
            }
    }

}

    public function show(Request $request)
    {
        $username = $request->input('user_name');


        $user = authentication::where('user_name', $username)->first();
        return response()->json($user, 200);
    }

    public function edit(authentication $authentication)
    {
        //
    }

}

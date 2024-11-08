<?php

namespace App\Http\Controllers;

use App\Models\authentication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Validator;

class AuthenticationController extends Controller
{
    //Eliminrar metodo index() - no puede estar en produ
    public function index()
    {
        $Authen = Authentication::all();

        if($Authen->isEmpty()){
            $data = 
            [
                'message' => 'No hay Compañias',
                'status' => 200
            ];

            return response()->json($data, 200);

        }else{
            $Authen = $Authen->map(function ($item) {
                unset($item->password);
                return $item;
            });
            $data = [
                'Authen' => $Authen,
                'status' => 200
            ];
   
            return response()->json($data, 200);
        }
    }

    public function store(Request $request)
    {
            $Validator = Validator::make($request->all(), [
                'user_name' => 'required|unique:Authentication',
                'password' => [
                                'required',
                                'string',
                                'min:8',              // Mínimo 8 caracteres
                                'regex:/[a-z]/',      // Al menos una letra minúscula
                                'regex:/[A-Z]/',      // Al menos una letra mayúscula
                                'regex:/[0-9]/',      // Al menos un número
                                'regex:/[@$!%*?&]/',  // Al menos un carácter especial
                            ],
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
                    'password' => $request->password,
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
                    $username = $user['user_name'];
                    $data = authentication::where('user_name', $username)->first();
                    $data = [
                        'user' => $user,
                        'status' => 201
                    ];
                    return response()->json($data, 201);

                }
        }

    }

    public function authenticate(Request $request)
    {
        $Validator = Validator::make($request->all(), [
            'user_name' => 'required',
            'password' => 'required'
        ]);
        
        if ($Validator->fails()) {
            $data = [
                'message' => 'Bad Request: Datos errados',
                'error' => $Validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }

        $username = $request->input('user_name');

        $user = Authentication::where('user_name', $username)->first();

        if ($request->input('password') == $user->password) {
            $data = [
                'message' => 'Usuario autenticado correctamente',
                'user' => $user,
                'status' => 200
            ];
            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Credenciales incorrectas',
                'status' => 401
            ];
            return response()->json($data, 200);
        }
    }

    public function update(Request $request, $id) 
    {
        $user = authentication::find($id);

        if (!$user) { 
            return response()->json(['error' => 'User not found'], 404); 
        }
        
    $validator = Validator::make($request->all(), [ 

        'user_name' => 'sometimes|string|unique:Authentication', 
        'password' => [
                        'sometimes',
                        'string',
                        'min:8',             
                        'regex:/[a-z]/',      
                        'regex:/[A-Z]/',      
                        'regex:/[0-9]/',      
                        'regex:/[@$!%*?&]/', 
                    ], 
        'last_access_date' => 'sometimes|date', 
        'state' => 'sometimes|string', 
    ]);

    if ($validator->fails()) { 
        return response()->json([
            'error' => 'Validation failed', 
            'message' => $validator->errors()], 400); 
        }

        if ($request->has('user_name')) { 
            $user->user_name = $request->input('user_name'); 
        }
        if ($request->has('password')) { 
            $user->password = Hash::make($request->input('password')); 
        }
        if ($request->has('last_access_date')) { 
            $user->last_access_date = $request->input('last_access_date'); 
        }
        if ($request->has('state')) { 
            $user->state = $request->input('state'); 
        }

        $data = [
            'message' => 'usuario actualizado',
            'company' => $user,
            'status' => 200
        ];

        return response()->json($data, 200);
    }
}

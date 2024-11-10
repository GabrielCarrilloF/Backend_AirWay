<?php

namespace App\Http\Controllers;

use App\Models\authentication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Validator;
use App\Helpers\AuthenticationValidationHelpers;

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
            $data = [
                'Authen' => $Authen,
                'status' => 200
            ];
   
            return response()->json($data, 200);
        }
    }

    public function store(Request $request)
    {
        $passwordValidation = AuthenticationValidationHelpers::validatePassword();
        $userNameValidation = AuthenticationValidationHelpers::validateUserName();
        $suppliersValidation = AuthenticationValidationHelpers::validateSuppliers();
        $lastAccessDateValidation = AuthenticationValidationHelpers::validateLastAccessDate();
        $stateValidation = AuthenticationValidationHelpers::validateState();
        
        $rules = [
            'user_name' => $userNameValidation['rules'],
            'password' => $passwordValidation['rules'],
            'suppliers' => $suppliersValidation['rules'],
            'last_access_date' => $lastAccessDateValidation['rules'],
            'state' => $stateValidation['rules']
        ];

        $messages = array_merge(
            $userNameValidation['messages'],
            $passwordValidation['messages'],
            $suppliersValidation['messages'],
            $lastAccessDateValidation['messages'],
            $stateValidation['messages']
        );

        $Validator = Validator::make($request->all(), $rules, $messages);

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
                    $data = [
                        'user' => $user,
                        'status' => 201
                    ];
                    $username = $data['user']['user_name'];
                    $user = authentication::where('user_name', $username)->first();
                    return response()->json($user, 201);

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
        
        $passwordValidation = AuthenticationValidationHelpers::validatePassword();
        $userNameValidation = AuthenticationValidationHelpers::validateUserName();
        $suppliersValidation = AuthenticationValidationHelpers::validateSuppliers();
        $lastAccessDateValidation = AuthenticationValidationHelpers::validateLastAccessDate();
        $stateValidation = AuthenticationValidationHelpers::validateState();
        
        

            if ($request->has('user_name')) {
                
                $rules = [
                    'user_name' => $userNameValidation['rules'],
                ];
        
                $messages = array_merge(
                    $userNameValidation['messages'],
                );
        
                $validator = Validator::make($request->all(), $rules, $messages);
        
                if ($validator->fails()) { 
                    return response()->json([
                        'error' => 'Validation failed', 
                        'message' => $validator->errors()], 400); 
                } 

                $user->user_name = $request->input('user_name'); 

            }

            if ($request->has('password')) { 

                $rules = [
                    'password' => $passwordValidation['rules'],
                ];
        
                $messages = array_merge(
                    $passwordValidation['messages'],
                );
        
                $validator = Validator::make($request->all(), $rules, $messages);
        
                if ($validator->fails()) { 
                    return response()->json([
                        'error' => 'Validation failed', 
                        'message' => $validator->errors()], 400); 
                }

                $user->password = Hash::make($request->input('password')); 
            }
            if ($request->has('last_access_date')) { 

                $rules = [
                    'last_access_date' => $lastAccessDateValidation['rules'],
                ];
        
                $messages = array_merge(
                    $lastAccessDateValidation['messages'],
                );
        
                $validator = Validator::make($request->all(), $rules, $messages);
        
                if ($validator->fails()) { 
                    return response()->json([
                        'error' => 'Validation failed', 
                        'message' => $validator->errors()], 400); 
                }

                $user->last_access_date = $request->input('last_access_date'); 
            }
            if ($request->has('state')) {
                
                $rules = [
                    'state' => $stateValidation['rules']
                ];
        
                $messages = array_merge(
                    $stateValidation['messages']
                );
        
                $validator = Validator::make($request->all(), $rules, $messages);
        
                if ($validator->fails()) { 
                    return response()->json([
                        'error' => 'Validation failed', 
                        'message' => $validator->errors()], 400); 
                }
                
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

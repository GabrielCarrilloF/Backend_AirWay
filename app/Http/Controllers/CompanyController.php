<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class CompanyController extends Controller
{
    public function index()
    {
        $company = Company::all();

        if($company->isEmpty()){
            $data = 
            [
                'message' => 'No hay Compañias',
                'status' => 200
            ];

            return response()->json($data, 200);

        }else{
            $data = 
            [
                'companys' => $company,
                'status' => 200
            ];
            return response()->json($data, 200);
        }
    }

    public function store(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'authen_id' => 'required|string|unique:company,authen_id',
            'plan_id' => 'required|in:PVS-9101,MTH-5678,ANL-5235',
            'name' => 'required|string|unique:company,name',
            'email' => 'required|email|unique:company,email',
            'phone_number' => 'required|digits:10|unique:company,phone_number',
            'address' => 'nullable|string',
            'contact_person' => 'nullable|string'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Bad Request: Datos errados',
                'errors' => $validator->errors(),
                'status' => 400
            ], 400);
        }

        $company = Company::create([
            'authen_id' => $request->authen_id,
            'plan_id' => $request->plan_id,
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'contact_person' => $request->contact_person
        ]);

        if (!$company) {
            return response()->json([
                'message' => 'Internal Server Error: No se pudo crear una nueva compañía',
                'status' => 500
            ], 500);
        }

        return response()->json([
            'message' => 'Company created successfully',
            'company' => $company,
            'status' => 201
        ], 201);

    }

    public function show($id)
    {
        $company = Company::find($id);

        if (!$company) {
            return response()->json([
                'message' => 'Compañia no encontrada.',
                'status' => 404
            ], 404);
        }

        $data = [
            'company' => $company,
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    public function update(Request $request, $id)
    {
        $company = Company::find($id);

        if (!$company) {
            return response()->json([
                'message' => 'Compañia no encontrada.',
                'status' => 404
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            //'authen_id' => 'required|string|unique:company,authen_id',
            'plan_id' => 'required|in:PVS-9101,MTH-5678,ANL-5235',
            'name' => 'required|string',
            'email' => 'required|email|unique:company,email',
            'phone_number' => 'required|digits:10|unique:company,phone_number',
            'address' => 'nullable|string',
            'contact_person' => 'nullable|string'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Bad Request: Datos errados',
                'errors' => $validator->errors(),
                'status' => 400
            ], 400);
        }

        $company->plan_id = $request->plan_id;
        $company->name = $request->name;
        $company->email = $request->email;
        $company->phone_number = $request->phone_number;
        $company->address = $request->address;
        $company->contact_person = $request->contact_person;

        $company->save();
        
        $data = [
            'message' => 'Comapañia actualizada',
            'company' => $company,
            'status' => 200
        ];

        return response()->json($data, 200);

    }

    public function updatePatch(Request $request, $id)
    {
        $company = Company::find($id);

        if (!$company) {
            return response()->json([
                'message' => 'Compañia no encontrada.',
                'status' => 404
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            //'authen_id' => 'required|string|unique:company,authen_id',
            'plan_id' => 'in:PVS-9101,MTH-5678,ANL-5235',
            'name' => 'string',
            'email' => 'email|unique:company,email',
            'phone_number' => 'digits:10|unique:company,phone_number',
            'address' => 'nullable|string',
            'contact_person' => 'nullable|string'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Bad Request: Datos errados',
                'errors' => $validator->errors(),
                'status' => 400
            ], 400);
        }

        if($request->has('name')){
            $company->name = $request->name;
        }

        if($request->has('plan_id')){
            $company->plan_id = $request->plan_id;
        }

        if($request->has('email')){
            $company->email = $request->email;
        }

        if($request->has('phone_number')){
            $company->phone_number = $request->phone_number;
        }

        if($request->has('address')){
            $company->address = $request->address;
        }

        if($request->has('contact_person')){
            $company->contact_person = $request->contact_person;
        }

        $company->save();
        
        $data = [
            'message' => 'Comapañia actualizada',
            'company' => $company,
            'status' => 200
        ];

        return response()->json($data, 200);

    }
}

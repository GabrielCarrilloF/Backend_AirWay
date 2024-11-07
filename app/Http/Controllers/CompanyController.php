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
            'authen_id' => 'required',
            'plan_id' => 'nullable',
            'name' => 'required|string|unique:company,name',
            'email' => 'required|email|unique:company,email',
            'phone_number' => 'required|string',
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

    public function create()
    {
        //
    }


    public function show(Company $company)
    {
        //
    }

    public function edit(Company $company)
    {
        //
    }

    public function update(Request $request, Company $company)
    {
        //
    }

    public function destroy(Company $company)
    {
        //
    }
}

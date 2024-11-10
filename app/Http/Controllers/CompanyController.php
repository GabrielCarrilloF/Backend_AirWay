<?php

namespace App\Http\Controllers;

use App\Helpers\CompanyValidationHelpers;
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
            'authen_id' => CompanyValidationHelpers::validateAuthenId()['rules'],
            'plan_id' => CompanyValidationHelpers::validatePlanId()['rules'],
            'name' => CompanyValidationHelpers::validateName()['rules'],
            'type_company' => CompanyValidationHelpers::validateTypeCompany()['rules'],
            'email' => CompanyValidationHelpers::validateEmail()['rules'],
            'phone_number' => CompanyValidationHelpers::validatePhoneNumber()['rules'],
            'address' => CompanyValidationHelpers::validateAddress()['rules'],
            'contact_person' => CompanyValidationHelpers::validateContactPerson()['rules'],
        ], array_merge(
            CompanyValidationHelpers::validateAuthenId()['messages'],
            CompanyValidationHelpers::validatePlanId()['messages'],
            CompanyValidationHelpers::validateName()['messages'],
            CompanyValidationHelpers::validateTypeCompany()['messages'],
            CompanyValidationHelpers::validateEmail()['messages'],
            CompanyValidationHelpers::validatePhoneNumber()['messages'],
            CompanyValidationHelpers::validateAddress()['messages'],
            CompanyValidationHelpers::validateContactPerson()['messages']
        ));

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
            'type_company' => $request->type_company,
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

    public function updatePatch(Request $request, $id)
    {
        $company = Company::find($id);

        if (!$company) {
            return response()->json([
                'message' => 'Compañia no encontrada.',
                'status' => 404
            ], 404);
        }

        if($request->has('name')){
            $validator = Validator::make($request->all(), [
                'name' => CompanyValidationHelpers::validateName()['rules']
            ], array_merge(
                CompanyValidationHelpers::validateName()['messages']
            ));
    
            if ($validator->fails()) {
                return response()->json([
                    'message' => 'Bad Request: Datos errados',
                    'errors' => $validator->errors(),
                    'status' => 400
                ], 400);
            }
            $company->name = $request->name;
        }

        if($request->has('plan_id')){
            $validator = Validator::make($request->all(), [
                'plan_id' => CompanyValidationHelpers::validatePlanId()['rules']
            ], array_merge(
                CompanyValidationHelpers::validatePlanId()['messages'],
            ));
    
            if ($validator->fails()) {
                return response()->json([
                    'message' => 'Bad Request: Datos errados',
                    'errors' => $validator->errors(),
                    'status' => 400
                ], 400);
            }
            $company->plan_id = $request->plan_id;
        }

        if($request->has('email')){

            $validator = Validator::make($request->all(), [
                'email' => CompanyValidationHelpers::validateEmail()['rules']
            ], array_merge(
                CompanyValidationHelpers::validateEmail()['messages']
            ));
    
            if ($validator->fails()) {
                return response()->json([
                    'message' => 'Bad Request: Datos errados',
                    'errors' => $validator->errors(),
                    'status' => 400
                ], 400);
            }

            $company->email = $request->email;
        }

        if($request->has('phone_number')){
            $validator = Validator::make($request->all(), [
                'phone_number' => CompanyValidationHelpers::validatePhoneNumber()['rules']
            ], array_merge(
                CompanyValidationHelpers::validatePhoneNumber()['messages']
            ));
    
            if ($validator->fails()) {
                return response()->json([
                    'message' => 'Bad Request: Datos errados',
                    'errors' => $validator->errors(),
                    'status' => 400
                ], 400);
            }
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

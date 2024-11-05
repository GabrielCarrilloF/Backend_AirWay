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
        $Validator = Validator::make($request, [
            'id_authen' => 'required',
            'plan_id',
            'name' => 'required',
            'email' => 'required|email',
            'phone_number'=>'required',
            'address',
            'contact_person'
        ]);

        if($Validator->fails()){
            $data = [
                'message' => 'Bad Request: Datos errados',
                'error' => $Validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }else{
            $company = Company::create(
                [
                    'id_authen' => $request->id_authen,
                    'plan_id' => $request->plan_id,
                    'name' => $request->name,
                    'email' => $request->email,
                    'phone_number'=> $request->phone_number,
                    'address' => $request->address,
                    'contact_person' => $request->contact_person
                ]
            );

            if(!$company){
                //Valiidar si no lo pudo crear un erro %5OO - 17:35->Gabriel Carrillo....
            }
        }
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

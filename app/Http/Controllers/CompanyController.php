<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::all();
        return response()->json($companies, Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:company,name',
            'email' => 'nullable|email|unique:company,email',
            'phone_number' => 'required|string|max:255|unique:company,phone_number',
            'address' => 'nullable|string',
            'contact_person' => 'nullable|string|max:255',
            'authen_id' => 'nullable|uuid|exists:authentication,id',
            'plan_id' => 'nullable|uuid|exists:plan,id',
        ]);

        $company = Company::create($request->all());

        return response()->json($company, Response::HTTP_CREATED);
    }

    /**
     * Muestra los detalles de una compañía específica.
     */
    public function show($name)
    {
        $company = Company::findOrFail($name);
        return response()->json($company, Response::HTTP_OK);
    }

    /**
     * Actualiza una compañía existente.
     */
    public function update(Request $request, $name)
    {
        $company = Company::findOrFail($name);

        $request->validate([
            'email' => 'nullable|email|unique:company,email,' . $company->name . ',name',
            'phone_number' => 'required|string|max:255|unique:company,phone_number,' . $company->name . ',name',
            'address' => 'nullable|string',
            'contact_person' => 'nullable|string|max:255',
            'authen_id' => 'nullable|uuid|exists:authentication,id',
            'plan_id' => 'nullable|uuid|exists:plan,id',
        ]);

        $company->update($request->all());

        return response()->json($company, Response::HTTP_OK);
    }

    /**
     * Elimina una compañía.
     */
    public function destroy($name)
    {
        
    }
}

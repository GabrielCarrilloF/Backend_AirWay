<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;



class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    
    public function store(Request $request)
    {
         $validator = Validator::make($request->all(), [
            'company_id' => 'required|exists:company,id', 
            'plan_id' => 'required|exists:plan,id',        
            'payment_day' => 'required|date',
            'amount_paid' => 'required|numeric|min:0',      
            'payment_type' => 'required|string|max:50',     
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Error de validación',
                'errors' => $validator->errors()
            ], 422); 
        }

        $payment = Payment::create([

            'company_id'  => $request->company_id,
            'plan_id' => $request->plan_id,
            'payment_day' => $request->payment_day,
            'amount_paid' => $request->amount_paid,
            'payment_type' => $request->payment_type

        ]);

        if (!$payment) {
            return response()->json([
                'message' => 'Internal Server Error: No se pudo crear una nuevo pago',
                'status' => 500
            ], 500);
        }

        return response()->json([
            'message' => 'payment created successfully',
            'company' => $payment,
            'status' => 201
        ], 201);

    }

    
    public function show($id)
    {
        $company = Company::find($id);
        if (!$company) {
            return response()->json(['error' => 'Company not found'], 404);
        }

        // Obtén los pagos asociados a la compañía
        $payments = Payment::where('company_id', $id)->get();

        return response()->json([
            'company' => $company->name,
            'payments' => $payments
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payment $payment)
    {
        //
    }
}

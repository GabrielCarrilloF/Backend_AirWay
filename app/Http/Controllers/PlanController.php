<?php

namespace App\Http\Controllers;

use App\Models\Plan;

class PlanController extends Controller
{
    public function index()
    {
        $plan = Plan::all();

        if($plan->isEmpty()){
            $data = 
            [
                'message' => 'No hay planes.',
                'status' => 200
            ];

            return response()->json($data, 200);

        }else{
            $data = 
            [
                'planes' => $plan,
                'status' => 200
            ];
            return response()->json($data, 200);
        }
    }

    public function show($id)
    {
        $plan = Plan::find($id);

        if (!$plan) {
            return response()->json([
                'message' => 'Pla no encontrado.',
                'status' => 404
            ], 404);
        }

        $data = [
            'plan' => $plan,
            'status' => 200
        ];

        return response()->json($data, 200);
    }
}

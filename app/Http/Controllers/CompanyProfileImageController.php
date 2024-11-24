<?php

namespace App\Http\Controllers;

use App\Models\CompanyProfileImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use App\Helpers\ProfileImageValidationHelpers;

class CompanyProfileImageController extends Controller
{
    public function store(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'company_id' => ProfileImageValidationHelpers::validateCompanyId()['rules'],
            'image_url' => ProfileImageValidationHelpers::validateImageUrl()['rules']
        ], array_merge(
            ProfileImageValidationHelpers::validateCompanyId()['messages'],
            ProfileImageValidationHelpers::validateImageUrl()['messages']
        ));

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Bad Request: Datos errados',
                'errors' => $validator->errors(),
                'status' => 400
            ], 400);
        }

    
        $companyProfileImage = CompanyProfileImage::create([
            'company_id' => $request->company_id,
            'image_url' => $request->image_url
        ]);

        if (!$companyProfileImage) {
            return response()->json([
                'message' => 'Internal Server Error: No se pudo crear una nueva imagen',
                'status' => 500
            ], 500);
        }

        return response()->json([
            'message' => 'Imagen de perfil creada exitosamente',
            'companyProfileImage' => $companyProfileImage,
            'status' => 201
        ], 201);
    }

    public function destroy($id)
    {
        $image = CompanyProfileImage::find($id);

        if (!$image) {
            return response()->json([
                'message' => 'Imagen de perfil no encontrada.',
                'status' => 404
            ], 404);
        }

        
        $image->delete();

        return response()->json([
            'message' => 'Imagen de perfil eliminada correctamente.',
            'status' => 200
        ], 200);
    }


    public function update(Request $request, $id)
    {
        $image = CompanyProfileImage::find($id);

        if (!$image) {
            return response()->json([
                'message' => 'Imagen de perfil no encontrada.',
                'status' => 404
            ], 404);
        }

        
        if ($request->has('image_url')) {
            $validator = Validator::make($request->all(), [
                'image_url' => ProfileImageValidationHelpers::validateImageUrl()['rules']
            ], array_merge(
                ProfileImageValidationHelpers::validateImageUrl()['messages']
            ));

            if ($validator->fails()) {
                return response()->json([
                    'message' => 'Bad Request: Datos errados',
                    'errors' => $validator->errors(),
                    'status' => 400
                ], 400);
            }

            
            $image->image_url = $request->image_url;
        }

        $image->save();

        return response()->json([
            'message' => 'Imagen de perfil actualizada correctamente',
            'image' => $image,
            'status' => 200
        ], 200);
    }
}

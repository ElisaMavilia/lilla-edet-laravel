<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Treatment;

class TreatmentsController extends Controller
{
    public function index()
    {
        $treatments = Treatment::all();
       /*  dd($treatments); */
        return response()->json([
            'success' => true,
            'status' => 'success',
            'message' => 'Ok',
            'results' => $treatments
        ], 200);
    }

    public function show($slug)
    {
        $treatment = Treatment::where('slug', $slug)
        ->first();
        if($treatment){
            return response()->json([
                'status' => 'success',
                'message' => 'OK',
                'results' => $treatment
            ],200);
        } else {
            return response()->json([
                'status' => 'error',	
                'message' => 'Error'
            ],404);
        }
    }
    
    
}

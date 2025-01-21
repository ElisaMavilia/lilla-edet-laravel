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
        dd($treatments);
        return response()->json([
            'success' => true,
            'status' => 'success',
            'message' => 'Ok',
            'results' => $treatments
        ], 200);
    }
}

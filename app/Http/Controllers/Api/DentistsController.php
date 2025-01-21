<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Dentist;
use Illuminate\Http\Request;

class DentistsController extends Controller
{
    public function index()
    {
        $dentists = Dentist::all();
        dd($dentists);
        return response()->json([
            'success' => true,
            'status' => 'success',
            'message' => 'Ok',
            'results' => $dentists
        ], 200);
    }
}

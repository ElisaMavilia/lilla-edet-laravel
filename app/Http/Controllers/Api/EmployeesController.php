<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeesController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        /* dd($employees); */
        return response()->json([
            'success' => true,
            'status' => 'success',
            'message' => 'Ok',
            'results' => $employees
        ], 200);
    }

    public function show($slug)
    {
        $employee = Employee::where('slug', $slug)
        ->first();
        if($employee){
            return response()->json([
                'status' => 'success',
                'message' => 'OK',
                'results' => $employee
            ],200);
        } else {
            return response()->json([
                'status' => 'error',	
                'message' => 'Error'
            ],404);
        }
    }
}

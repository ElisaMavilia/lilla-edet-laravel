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
}

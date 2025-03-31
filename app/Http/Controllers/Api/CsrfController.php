<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class CsrfController extends Controller
{
    public function getToken()
    {
        return response()->json(['csrf_token' => csrf_token()]);
    }
}

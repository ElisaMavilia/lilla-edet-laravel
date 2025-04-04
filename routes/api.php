<?php

use App\Http\Controllers\Api\DentistsController;
use App\Http\Controllers\Api\EmployeesController;
use App\Http\Controllers\Api\TreatmentsController;
use App\Http\Controllers\Api\AboutUsController;
use App\Http\Controllers\Api\LeadController;
use App\Http\Controllers\Api\PricesController;
use App\Http\Controllers\Api\GalleryController;
use App\Http\Controllers\Api\CsrfController;
use App\Models\Treatment;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('employees', [EmployeesController::class, 'index']);
Route::get('dentists', [DentistsController::class, 'index']);
Route::get('treatments', [TreatmentsController::class, 'index']);
Route::get('behandlingar/{slug}', [TreatmentsController::class, 'show']);
Route::get('validate-slug/{slug}', function ($slug) {
    // Verifica se lo slug esiste nel database
    $valid = Treatment::where('slug', $slug)->exists();

    return response()->json([
        'isValid' => $valid
    ]);
});

Route::get('om-oss ', [AboutUsController::class, 'index']);
Route::post('kontakta-oss', [LeadController::class, 'store']) ;
Route::get('prislista', [PricesController::class, 'index']);
Route::get('galleri', [GalleryController::class, 'index']);
Route::get('latest-lead', [LeadController::class, 'latest']);

Route::get('/csrf-token', [CsrfController::class, 'getToken']);





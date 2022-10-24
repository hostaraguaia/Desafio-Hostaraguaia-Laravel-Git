<?php

use Modules\Vehicle\Http\Controllers\FuelTypeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
| 
*/

$controller = FuelTypeController::class;

Route::middleware(['Log:api.fueltype', 'auth:api', 'AccessControl'])->prefix("vehicle/")->as("vehicle.")->group(function () use ($controller) {
    Route::apiResource("fueltype", $controller);
    Route::get("fueltype/{fueltype}/audit"   ,["as" => "fueltype.audit"   ,"uses" => "$controller@audit"   ]);
    Route::get("fueltype/{fueltype}/recover" ,["as" => "fueltype.recover" ,"uses" => "$controller@recover" ]);
    Route::get("fueltype/{fueltype}/block"   ,["as" => "fueltype.block"   ,"uses" => "$controller@block"   ]);
    Route::get("fueltype/{fueltype}/unblock" ,["as" => "fueltype.unblock" ,"uses" => "$controller@unblock" ]);
});

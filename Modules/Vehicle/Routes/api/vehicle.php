<?php

use Modules\Vehicle\Http\Controllers\VehicleController;
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

$controller = VehicleController::class;

Route::middleware(['Log:api.vehicle', 'auth:api', 'AccessControl'])->prefix("vehicle/")->as("vehicle.")->group(function () use ($controller) {
    Route::apiResource("vehicle", $controller);
    Route::get("vehicle/{vehicle}/audit"   ,["as" => "vehicle.audit"   ,"uses" => "$controller@audit"   ]);
    Route::get("vehicle/{vehicle}/recover" ,["as" => "vehicle.recover" ,"uses" => "$controller@recover" ]);
    Route::get("vehicle/{vehicle}/block"   ,["as" => "vehicle.block"   ,"uses" => "$controller@block"   ]);
    Route::get("vehicle/{vehicle}/unblock" ,["as" => "vehicle.unblock" ,"uses" => "$controller@unblock" ]);
});

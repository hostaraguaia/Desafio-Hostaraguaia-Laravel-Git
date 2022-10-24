<?php

use Modules\Vehicle\Http\Controllers\VehicleDriversMapController;
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

$controller = VehicleDriversMapController::class;

Route::middleware(['Log:api.vehicledriversmap', 'auth:api', 'AccessControl'])->prefix("vehicle/")->as("vehicle.")->group(function () use ($controller) {
    Route::apiResource("vehicledriversmap", $controller);
    Route::get("vehicledriversmap/{vehicledriversmap}/audit"   ,["as" => "vehicledriversmap.audit"   ,"uses" => "$controller@audit"   ]);
    Route::get("vehicledriversmap/{vehicledriversmap}/recover" ,["as" => "vehicledriversmap.recover" ,"uses" => "$controller@recover" ]);
    Route::get("vehicledriversmap/{vehicledriversmap}/block"   ,["as" => "vehicledriversmap.block"   ,"uses" => "$controller@block"   ]);
    Route::get("vehicledriversmap/{vehicledriversmap}/unblock" ,["as" => "vehicledriversmap.unblock" ,"uses" => "$controller@unblock" ]);
});

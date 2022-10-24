<?php

use Modules\Units\Http\Controllers\FuelStationController;
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

$controller = FuelStationController::class;

Route::middleware(['Log:api.fuelstation', 'auth:api', 'AccessControl'])->prefix("units/")->as("units.")->group(function () use ($controller) {
    Route::apiResource("fuelstation", $controller);
    Route::get("fuelstation/{fuelstation}/audit"   ,["as" => "fuelstation.audit"   ,"uses" => "$controller@audit"   ]);
    Route::get("fuelstation/{fuelstation}/recover" ,["as" => "fuelstation.recover" ,"uses" => "$controller@recover" ]);
    Route::get("fuelstation/{fuelstation}/block"   ,["as" => "fuelstation.block"   ,"uses" => "$controller@block"   ]);
    Route::get("fuelstation/{fuelstation}/unblock" ,["as" => "fuelstation.unblock" ,"uses" => "$controller@unblock" ]);
});

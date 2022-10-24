<?php

use Illuminate\Support\Facades\Route;
use Modules\Vehicle\Http\Controllers\VehicleController;

$controller = VehicleController::class;

Route::middleware(['Log:web.vehicle', 'auth', 'AccessControl'])->prefix("vehicle/")->as("vehicle.")->group(function () use ($controller) {
    Route::resource('/', $controller);
    Route::get("audit/{vehicle}"   ,["as" => "vehicle.audit"   ,"uses" => "$controller@audit"    ]);
    Route::get("recover/{vehicle}" ,["as" => "vehicle.recover" ,"uses" => "$controller@recover"  ]);
    Route::get("block/{vehicle}"   ,["as" => "vehicle.block"   ,"uses" => "$controller@block"    ]);
    Route::get("unblock/{vehicle}" ,["as" => "vehicle.unblock" ,"uses" => "$controller@unblock"  ]);
});

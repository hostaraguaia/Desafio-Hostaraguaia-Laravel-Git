<?php

use Illuminate\Support\Facades\Route;
use Modules\Vehicle\Http\Controllers\VehicleDriversMapController;

$controller = VehicleDriversMapController::class;

Route::middleware(['Log:web.vehicledriver', 'auth', 'AccessControl'])->prefix("vehicle/driver/")->as("vehicledriversmap.")->group(function () use ($controller) {
    Route::resource('/', $controller);
    Route::get("audit/{vehicledriver}"   ,["as" => "vehicledriversmap.audit"   ,"uses" => "$controller@audit"    ]);
    Route::get("recover/{vehicledriver}" ,["as" => "vehicledriversmap.recover" ,"uses" => "$controller@recover"  ]);
    Route::get("block/{vehicledriver}"   ,["as" => "vehicledriversmap.block"   ,"uses" => "$controller@block"    ]);
    Route::get("unblock/{vehicledriver}" ,["as" => "vehicledriversmap.unblock" ,"uses" => "$controller@unblock"  ]);
});

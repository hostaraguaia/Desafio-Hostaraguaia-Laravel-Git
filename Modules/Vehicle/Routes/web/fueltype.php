<?php

use Illuminate\Support\Facades\Route;
use Modules\Vehicle\Http\Controllers\FuelTypeController;

$controller = FuelTypeController::class;

Route::middleware(['Log:web.fueltype', 'auth', 'AccessControl'])->prefix("fueltype/")->as("fueltype.")->group(function () use ($controller) {
    Route::resource('/', $controller);
    Route::get("audit/{fueltype}"   ,["as" => "fueltype.audit"   ,"uses" => "$controller@audit"    ]);
    Route::get("recover/{fueltype}" ,["as" => "fueltype.recover" ,"uses" => "$controller@recover"  ]);
    Route::get("block/{fueltype}"   ,["as" => "fueltype.block"   ,"uses" => "$controller@block"    ]);
    Route::get("unblock/{fueltype}" ,["as" => "fueltype.unblock" ,"uses" => "$controller@unblock"  ]);
});

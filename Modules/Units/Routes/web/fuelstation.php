<?php
use Illuminate\Support\Facades\Route;
use Modules\Units\Http\Controllers\FuelStationController;

$controller = FuelStationController::class;

Route::middleware(['Log:web.fuelstation', 'auth', 'AccessControl'])->prefix("units/")->as("fuelstation.")->group(function () use ($controller) {
    Route::resource('/', $controller);
    Route::get("audit/{fuelstation}"   ,["as" => "fuelstation.audit"   ,"uses" => "$controller@audit"    ]);
    Route::get("recover/{fuelstation}" ,["as" => "fuelstation.recover" ,"uses" => "$controller@recover"  ]);
    Route::get("block/{fuelstation}"   ,["as" => "fuelstation.block"   ,"uses" => "$controller@block"    ]);
    Route::get("unblock/{fuelstation}" ,["as" => "fuelstation.unblock" ,"uses" => "$controller@unblock"  ]);
});
